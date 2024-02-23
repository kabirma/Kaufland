DROP TABLE IF EXISTS "category";
DROP SEQUENCE IF EXISTS category_id_seq;
CREATE SEQUENCE category_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1;

CREATE TABLE "public"."category" (
    "id" integer DEFAULT nextval('category_id_seq') NOT NULL,
    "name" varchar(255)  NOT NULL,
    CONSTRAINT "category_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

CREATE INDEX "category_name" ON "public"."category" USING btree ("name");

DROP TABLE IF EXISTS "brand";
DROP SEQUENCE IF EXISTS brand_id_seq;
CREATE SEQUENCE brand_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1;

CREATE TABLE "public"."brand" (
    "id" integer DEFAULT nextval('brand_id_seq') NOT NULL,
    "name" varchar(255)  NOT NULL,
    CONSTRAINT "brand_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

CREATE INDEX "brand_name" ON "public"."brand" USING btree ("name");

DROP TABLE IF EXISTS "post";
DROP SEQUENCE IF EXISTS post_id_seq;
CREATE SEQUENCE post_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1;

CREATE TABLE "public"."post" (
    "id" integer DEFAULT nextval('post_id_seq') NOT NULL,
    "entity_id" integer NOT NULL,
    "name" varchar(255) NOT NULL,
    "category_id" integer NOT NULL,
    "sku" varchar(150) NOT NULL,
    "description" text,
    "short_description" text,
    "price" numeric,
    "link" text NOT NULL,
    "image" text NOT NULL,
    "brand_id" integer NOT NULL,
    "rating" integer,
    "caffeine_type" varchar(255),
    "entity_count" integer,
    "flavored" integer,
    "seasonal" integer,
    "in_stock" varchar(150) NOT NULL,
    "facebook" boolean NOT NULL,
    "is_k_cup" boolean NOT NULL,
    CONSTRAINT "post_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

CREATE INDEX "post_entity_id" ON "public"."post" USING btree ("entity_id");

CREATE INDEX "post_name" ON "public"."post" USING btree ("name");