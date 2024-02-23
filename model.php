<?php
use Doctrine\ORM\EntityManager;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\ORMSetup;

require_once("trait.php");
require_once("Post.php");
require_once("Category.php");
require_once("Brand.php");

class Model
{
    use DataHelper;
    private $conn;
    private $em;

    private int $batchSize = 500;

    private $cache;
    public function __construct()
    {
        $connectionParams = [
            "dbname" => "datafeed",
            'user' => 'root',
            'password' => 'password',
            'host' => 'mysql_db',
            'driver' => 'pdo_mysql',
        ];

        // $connectionParams = [
        //     "dbname" => "datafeed",
        //     'user' => 'root',
        //     'password' => 'password',
        //     'host' => 'postgresql_db',
        //     'driver' => 'pdo_pgsql',
        // ];

        try {

            $config = ORMSetup::createAttributeMetadataConfiguration([__DIR__]);
            $this->conn = DriverManager::getConnection($connectionParams, $config);

            $entity_manager = new EntityManager($this->conn, $config);
            $this->em = $entity_manager;
            $this->cache = new Memcached();
            $this->cache->addServer('memcachedserver', 11211);
            // $this->cache->flush();
            // die;

        } catch (Throwable $e) {
            $this->log_error($e);
        } catch (Exception $e) {
            $this->log_error($e);
        }
    }

    public function process($data)
    {
        try {
            $count = 0;
            foreach ($data as $item) {
                $value = (array) $item;

                $value['categoryID'] = $this->checkCategory($value['CategoryName']);
                $value['brandID'] = $this->checkBrand($value['Brand']);

                $key_cache = hash("sha256", $value['name'] . $value['entity_id']);

                $exist_entity_id = $this->cache->get($key_cache);

                if (!$exist_entity_id) {
                    $post = new Post();
                    $this->savePost($value, $post);
                    $this->cache->set($key_cache, $value['entity_id']);
                    $this->cache->set("post_" . $value['entity_id'], implode("?-", $value));
                    if ($post) {
                        $this->em->persist($post);
                    }
                } else {
                    $cachedPost = $this->cache->get("post_" . $value['entity_id']);
                    if (implode("?-", $value) != $cachedPost) {
                        $post = $this->em->getRepository(Post::class)->findOneBy(['entity_id' => $exist_entity_id]);
                        if ($post) {
                            $this->savePost($value, $post);
                            $this->em->persist($post);
                        }
                    }
                }

                if ((++$count % $this->batchSize) == 0) {
                    $this->em->flush();
                    $this->em->clear();
                }
            }
            $this->em->flush();
            $this->em->clear();
            return true;
        } catch (Throwable $e) {
            $this->log_error($e);
        } catch (Exception $e) {
            $this->log_error($e);
        }
    }

    private function savePost($value, &$post)
    {
        try {
            $post->setEntityId((int) $value['entity_id']);
            $post->setCategoryID($value['categoryID']);
            $post->setSku($value['sku']);
            $post->setName($value['name']);
            $post->setDescription($value['description']);
            $post->setShortDescription($value['shortdesc']);
            $post->setPrice((float) $value['price']);
            $post->setLink($value['link']);
            $post->setImage($value['image']);
            $post->setBrandID($value['brandID']);
            $post->setRating((int) $value['Rating']);
            $post->setCaffeineType($value['CaffeineType']);
            $post->setEntityCount((int) $value['Count']);
            $post->setFlavored((bool) $value['Flavored']);
            $post->setSeasonal((bool) $value['Seasonal']);
            $post->setInstock((bool) $value['Instock']);
            $post->setFacebook((bool) $value['Facebook']);
            $post->setIsKCup((bool) $value['IsKCup']);

            return $post;
        } catch (Throwable $e) {
            $this->log_error($e);
        } catch (Exception $e) {
            $this->log_error($e);
        }
    }

    private function checkCategory($categoryName)
    {
        $key_cache_category = hash("sha256", $categoryName);

        $exist_category_id = $this->cache->get($key_cache_category);

        if ($exist_category_id) {
            return $exist_category_id;
        } else {
            $category = new Category();
            $category->setName($categoryName);
            $this->em->persist($category);
            $this->em->flush();
            $category_id = $category->getId();
            $this->cache->set($key_cache_category, $category_id);
            return $category_id;
        }
    }

    private function checkBrand($brandName)
    {
        $key_cache_brand = hash("sha256", $brandName);

        $exist_brand_id = $this->cache->get($key_cache_brand);

        if ($exist_brand_id) {
            return $exist_brand_id;
        } else {
            $brand = new Brand();
            $brand->setName($brandName);
            $this->em->persist($brand);
            $this->em->flush();
            $brand_id = $brand->getId();
            $this->cache->set($key_cache_brand, $brand_id);
            return $brand_id;
        }
    }
}