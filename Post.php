<?php

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'post')]
class Post
{	
    #[ORM\Id]
    #[ORM\Column,ORM\GeneratedValue]
    private int $id;

    #[ORM\Column]
    private int $entity_id;

    #[ORM\Column]
    private string $name;

    #[ORM\Column(name: 'category_id')]
    private int $categoryID;

	#[ORM\Column(name: 'brand_id')]
    private int $brandID;

    #[ORM\Column]
    private string $sku;

    #[ORM\Column]
    private string $description;

    
    #[ORM\Column(name: 'short_description')]
    private string $short_description;

    #[ORM\Column(type:'decimal',precision: 10, scale: 4 )]
    private float $price;

    #[ORM\Column]
    private string $link;

    #[ORM\Column]
    private string $image;

    #[ORM\Column]
    private int $rating;

    #[ORM\Column(type: "string", columnDefinition: "ENUM('Caffeinated', 'Caffeine Free', 'Decaffeinated')")]
    private string $caffeine_type;
    
    #[ORM\Column]
    private int $entity_count;

    #[ORM\Column]
    private int $flavored;

    #[ORM\Column]
    private int $seasonal;

    
    #[ORM\Column]
    private bool $in_stock;
    
    
    #[ORM\Column]
    private bool $facebook;

    #[ORM\Column]
    private bool $is_k_cup;

    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

	public function getDescription() : string {
		return $this->description;
	}

	public function setDescription(string $value) {
		$this->description = $value;
	}

	public function getCategoryID() : int {
		return $this->categoryID;
	}

	public function setCategoryID(int $value) {
		$this->categoryID = $value;
	}

	public function getBrandID() : int {
		return $this->brandID;
	}

	public function setBrandID(int $value) {
		$this->brandID = $value;
	}

	public function getSku() : int {
		return $this->sku;
	}

	public function setSku(string $value) {
		$this->sku = $value;
	}

	public function getPrice() : float {
		return $this->price;
	}

	public function setPrice(float $value) {
		$this->price = $value;
	}

	public function getLink() : string {
		return $this->link;
	}

	public function setLink(string $value) {
		$this->link = $value;
	}

	public function getImage() : string {
		return $this->image;
	}

	public function setImage(string $value) {
		$this->image = $value;
	}

	public function getBrand() : string {
		return $this->brand;
	}

	public function setBrand(string $value) {
		$this->brand = $value;
	}

	public function getRating() : int {
		return $this->rating;
	}

	public function setRating(int $value) {
		$this->rating = $value;
	}

	public function getCaffeineType() {
		return $this->caffeine_type;
	}

	public function setCaffeineType(string $value) {
		$this->caffeine_type = $value;
	}

	public function getEntityCount() : int {
		return $this->entity_count;
	}

	public function setEntityCount(int $value) {
		$this->entity_count = $value;
	}

	public function getFlavored() : bool {
		return $this->flavored;
	}

	public function setFlavored(bool $value) {
		$this->flavored = $value;
	}

	public function getSeasonal() : bool {
		return $this->seasonal;
	}

	public function setSeasonal(bool $value) {
		$this->seasonal = $value;
	}

	public function getInStock() : bool {
		return $this->in_stock;
	}

	public function setInStock(bool $value) {
		$this->in_stock = $value;
	}

	public function getFacebook() : bool {
		return $this->facebook;
	}

	public function setFacebook(bool $value) {
		$this->facebook = $value;
	}

	public function getIsKCup() : bool {
		return $this->is_k_cup;
	}

	public function setIsKCup(bool $value) {
		$this->is_k_cup = $value;
	}

	public function getShortDescription() : string {
		return $this->short_description;
	}

	public function setShortDescription(string $value) {
		$this->short_description = $value;
	}

	public function getEntityId() : int {
		return $this->entity_id;
	}

	public function setEntityId(int $value) {
		$this->entity_id = $value;
	}
}