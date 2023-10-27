CREATE TABLE `Users` (
  `user_id` int PRIMARY KEY,
  `user_name` vachar,
  `password` vachar,
  `email` vachar,
  `full_name` vachar,
  `address` vachar,
  `phone` vachar
);

CREATE TABLE `Products` (
  `product_id` int PRIMARY KEY,
  `product_name` vachar,
  `description` vachar,
  `price` vachar,
  `category_id` int,
  `brand_id` int,
  `image_url` vachar,
  `stock_quantity` vachar,
  `created_at` vachar,
  `updated_at` vachar
);

CREATE TABLE `Categories` (
  `category_id` int PRIMARY KEY,
  `categories_name` vachar
);

CREATE TABLE `Brand` (
  `brand_id` int PRIMARY KEY,
  `brand_name` vachar
);

CREATE TABLE `Orders` (
  `order_id` int PRIMARY KEY,
  `user_id` int,
  `order_date` vachar,
  `total_amount` vachar,
  `order_status` vachar,
  `shipping_address` vachar,
  `payment_method` vachar
);

CREATE TABLE `OrderDetail` (
  `order_detail_id` int PRIMARY KEY,
  `order_id` int,
  `product_id` int,
  `quantity` int,
  `subtotal` vachar,
  `coupon_id` int
);

CREATE TABLE `Review` (
  `review_id` int PRIMARY KEY,
  `product_id` int,
  `user_id` int,
  `rating` vachar,
  `comment` vachar,
  `review_date` vachar
);

CREATE TABLE `Payments` (
  `payment_id` int PRIMARY KEY,
  `order_id` int,
  `payment_date` vachar,
  `payment_amount` vachar,
  `payment_status` vachar
);

CREATE TABLE `Cart` (
  `cart_id` int PRIMARY KEY,
  `user_id` int,
  `product_id` int,
  `quantity` int
);

CREATE TABLE `Address` (
  `address_id` int PRIMARY KEY,
  `user_id` int,
  `address_line1` vachar,
  `address_line2` vachar,
  `city` vachar,
  `state` vachar,
  `postal_code` int,
  `country` vachar
);

CREATE TABLE `Wishlist` (
  `wishlist_id` int PRIMARY KEY,
  `user_id` int,
  `product_id` int
);

CREATE TABLE `Coupons` (
  `coupon_id` int PRIMARY KEY,
  `coupon_code` vachar,
  `discount_percentage` vachar,
  `expiration_date` vachar
);

CREATE TABLE `ProductsDetail` (
  `products_detail_id` int PRIMARY KEY,
  `product_id` int,
  `brand_id` int,
  `category_id` int,
  `color_id` int,
  `size_id` int,
  `images_id` int
);

CREATE TABLE `ProductImages` (
  `images_id` int PRIMARY KEY,
  `image` vachar,
  `image_name` vachar
);

CREATE TABLE `Size` (
  `size_id` int PRIMARY KEY,
  `size` vachar
);

CREATE TABLE `Color` (
  `color_id` int PRIMARY KEY,
  `color` vachar
);

ALTER TABLE `Review` ADD FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`);

ALTER TABLE `Address` ADD FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`);

ALTER TABLE `Orders` ADD FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`);

ALTER TABLE `Cart` ADD FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`);

ALTER TABLE `Products` ADD FOREIGN KEY (`category_id`) REFERENCES `Categories` (`category_id`);

ALTER TABLE `Products` ADD FOREIGN KEY (`brand_id`) REFERENCES `Brand` (`brand_id`);

ALTER TABLE `ProductsDetail` ADD FOREIGN KEY (`product_id`) REFERENCES `Products` (`product_id`);

ALTER TABLE `ProductsDetail` ADD FOREIGN KEY (`brand_id`) REFERENCES `Brand` (`brand_id`);

ALTER TABLE `ProductsDetail` ADD FOREIGN KEY (`category_id`) REFERENCES `Categories` (`category_id`);

ALTER TABLE `ProductsDetail` ADD FOREIGN KEY (`color_id`) REFERENCES `Color` (`color_id`);

ALTER TABLE `ProductsDetail` ADD FOREIGN KEY (`images_id`) REFERENCES `ProductImages` (`images_id`);

ALTER TABLE `ProductsDetail` ADD FOREIGN KEY (`size_id`) REFERENCES `Size` (`size_id`);

ALTER TABLE `OrderDetail` ADD FOREIGN KEY (`coupon_id`) REFERENCES `Coupons` (`coupon_id`);

ALTER TABLE `OrderDetail` ADD FOREIGN KEY (`product_id`) REFERENCES `Products` (`product_id`);

ALTER TABLE `OrderDetail` ADD FOREIGN KEY (`order_id`) REFERENCES `Orders` (`order_id`);

ALTER TABLE `Review` ADD FOREIGN KEY (`product_id`) REFERENCES `Products` (`product_id`);

ALTER TABLE `Cart` ADD FOREIGN KEY (`product_id`) REFERENCES `Products` (`product_id`);

ALTER TABLE `Payments` ADD FOREIGN KEY (`order_id`) REFERENCES `Orders` (`order_id`);

ALTER TABLE `Wishlist` ADD FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`);

ALTER TABLE `Wishlist` ADD FOREIGN KEY (`product_id`) REFERENCES `Products` (`product_id`);
