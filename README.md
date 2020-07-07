
# Seamless Image Grid

## Introduction
This repository contains the example to implement seamless grid for image and content. This design is responsive to serve 6 columns in Desktop, 3 columns in Tablet and 2 columns in mobile devices.

## Solution
It is Implemented in 2 ways
 1. Core PHP
 2. Javascript (Angular 10)

These examples are also have the implementation of PWA(Progressive web apps)
### Benefits of PWA
- Installable (User can install such apps on their device) 
- App like - (Once installed, It runs on its own thread instead of browser).
- Offline access - (Users can access it offline)
- Ingagement - (Push notification can be sent to engage users)

## PHP Execution steps
 - Copy and paste the PHP folder into the base of your localhost
 - Need to change the `config.php` file for the location of API and log path.
 - API response should return data in below format.
	`{
	"image": "http://domain.com/cuticle_mask_is_all_you_need_cover.jpg",
"viewCount": 602,
"type": "Fashion",
"title": "Nail care"
 }`
 - It will render content

## JavaScript (Angular 10) Execution Steps
- Navigate into the JS folder
- Execute `npm install` command to download the dependencies
- Execute `ng serve` command to run on local.
- Open `http://localhost:4200/` in browser.

## Demo Example

I have deployed the build on firebase hosting 
url : https://test-e5f27.firebaseapp.com/
