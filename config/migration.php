<?php

$conn=mysqli_connect('localhost','root','');
$sql="CREATE DATABASE IF NOT EXISTS `Ecommerce2`";
$res=mysqli_query($conn,$sql);
$conn=mysqli_connect('localhost','root','','Ecommerce2');

//  create catgory table
$sql="CREATE TABLE IF NOT EXISTS `categories`(
    `id` INT  PRIMARY KEY  AUTO_INCREMENT   NOT NULL,
    `name` VARCHAR(20) Not NULL  UNIQUE,
    `image` VARCHAR(400) NOT NULL

)";
$res=mysqli_query($conn,$sql);



//  create  product  table
$sql='CREATE TABLE IF NOT EXISTS `products`(
    `id` INT  PRIMARY KEY  AUTO_INCREMENT NOT NULL,
    `name` VARCHAR(20) Not NULL  UNIQUE,
    `description` TEXT NOT NULL,
    `image` VARCHAR(400) NOT NULL,
    `price` FLOAT NOT NULL,
    `offer` FLOAT NOT NULL,
    `qty`  INT DEFAULT 0 ,
    `category_id` int not null,
    FOREIGN  KEY (`category_id`) REFERENCES `categories`(`id`) ON DELETE CASCADE 

)';
$res=mysqli_query($conn,$sql);

//create user
$sql="CREATE TABLE IF NOT EXISTS `users`(
    `id` INT PRIMARY KEY AUTO_INCREMENT ,
    `name` VARCHAR(90) NOT NULL,
    `email` VARCHAR(100) NOT NULL  UNIQUE,
    `phone` VARCHAR(20) NOT NULL  UNIQUE,
    `password` VARCHAR(100) NOT NULL,
    `image` VARCHAR(300) NOT  NULL
   )";

$res=mysqli_query($conn,$sql);



// cart
$sql="CREATE TABLE IF NOT EXISTS `carts` (
    `id` INT  PRIMARY KEY  AUTO_INCREMENT NOT NULL,
    `user_id` int not null,
    `product_id` int not null,
    `product_qty` int not null,
    `created_at` timestamp DEFAULT CURRENT_TIMESTAMP(),
    FOREIGN  KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE ,
    FOREIGN  KEY (`product_id`) REFERENCES `products`(`id`) ON DELETE CASCADE 
    )
    ";
$res=mysqli_query($conn,$sql);


//orders

$sql="CREATE TABLE IF NOT EXISTS `orders`(
    `id` INT  PRIMARY KEY  AUTO_INCREMENT NOT NULL,
    `traking_no`     VARCHAR(90) NOT NULL    ,
    `name` VARCHAR(90) NOT NULL,
        `email` VARCHAR(100) NOT NULL ,  
          `phone` VARCHAR(15) NOT NULL ,
        `address`MEDIUMTEXT NOT NULL,
        `user_id` int not null,
        `zib_code`VARCHAR(100) NOT NULL,
        `total_price` FLOAT NOT NULL,
    `status` TINYINT DEFAULT 0 NOT NULL,
        `created_at` timestamp DEFAULT CURRENT_TIMESTAMP(),
        FOREIGN  KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE 
    )
    ";

$res=mysqli_query($conn,$sql);

// ////////////////
$sql="CREATE TABLE IF NOT EXISTS `order_items`(
    `id` INT  PRIMARY KEY  AUTO_INCREMENT NOT NULL,
    `order_id`int not null,
    `product_id`  int not null,
    `product_qty` int not null,
    `total_price`FLOAT NOT NULL,
    `created_at` timestamp DEFAULT CURRENT_TIMESTAMP(),
        FOREIGN  KEY (`product_id`) REFERENCES `products`(`id`) ON DELETE CASCADE ,
        FOREIGN  KEY (`order_id`) REFERENCES `orders`(`id`) ON DELETE CASCADE 
    )";
    
$res=mysqli_query($conn,$sql);
