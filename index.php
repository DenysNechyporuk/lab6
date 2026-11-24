<?php
require_once 'House.php';
require_once 'functions.php';

// Завдання 5. Локація для футера
$location = 'м. Рівне, вул. Соборна, 1,<br>33000, Україна';

// Завдання 7. Об'єкти будинків
$houses = [
    new House('Detached house • 5y old', 750000, '742 Evergreen Terrace', '(555) 555-4321', 'Tiffany Heffner', 'img/house1.jpg', 'img/agent1.jpg', 3, 2),
    new House('Cottage • 2y old', 520000, '12 Maple Street', '(555) 555-1234', 'John Carter', 'img/house2.jpg', 'img/agent2.jpg', 2, 1),
    new House('Villa • new', 1200000, '5 Ocean Drive', '(555) 555-9876', 'Emma Stone', 'img/house3.jpg', 'img/agent3.jpg', 5, 3),
    new House('Townhouse • 10y old', 430000, '88 Park Avenue', '(555) 555-2468', 'Mark Lee', 'img/house4.jpg', 'img/agent4.jpg', 3, 2),
];

?>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Лабораторна робота 6</title>
</head>
<body class="subpixel-antialiased font-Montserrat">
<nav class="sticky top-0 h-20 bg-[#243c5a] p-5 sm:px-24 xl:px-64 z-10">
  <div class="mx-auto flex justify-between items-center">
    <a href="#" class="uppercase text-white text-xl xl:text-3xl font-bold leading-normal tracking-tighter">Start Tailwind</a>
    <div class="hidden md:block">
      <a href="#portfolio" class="px-4 uppercase text-white text-base font-bold hover:text-green-500">Portfolio</a>
      <a href="#about" class="px-4 uppercase text-white text-base font-bold hover:text-green-500">About</a>
      <a href="#contact" class="px-4 uppercase text-white text-base font-bold hover:text-green-500">Contact</a>
    </div>
  </div>
</nav>
<main>
  <section class="bg-green-500 py-32">
    <figure class="container px-16 pt-12 mx-auto">
      <img class="mb-12 h-64 mx-auto" src="https://francescomansi.me/img/start-tailwind/avataaars.svg" alt="">
    </figure>
    <h1 class="text-center uppercase text-white text-5xl lg:text-6xl font-bold leading-none">Start Tailwind</h1>
    <p class="px-12 pt-6 text-center text-white text-xl">Graphic Artist - Web Designer - Illustrator</p>
  </section>

  <!-- Завдання 7–8. Будинки виводяться в циклі -->
  <section id="portfolio" class="bg-white -mt-12 py-16">
    <div class="flex items-center justify-center grid lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1">
      <?php foreach ($houses as $house): ?>
        <?php $discount = getDiscount(); ?>
        <div class="max-w-sm w-full py-6 px-3">
          <div class="bg-white shadow-xl rounded-lg overflow-hidden">
            <div class="bg-cover bg-center h-56 p-4 relative" style="background-image: url(<?= $house->image ?>)">
              <?php if ($discount > 0): ?>
                <span class="absolute top-3 left-3 bg-red-600 text-white text-sm font-bold px-2 py-1 rounded">-<?= $discount ?>%</span>
              <?php endif; ?>
            </div>
            <div class="p-4">
              <p class="uppercase tracking-wide text-sm font-bold text-gray-700"><?= $house->title ?></p>
              <?php if ($discount > 0): ?>
                <p class="text-xl text-gray-500 line-through"><?= $house->formatPrice($house->price) ?></p>
                <p class="text-4xl font-bold text-red-600"><?= $house->formatPrice((int)round($house->price * (100 - $discount) / 100)) ?></p>
              <?php else: ?>
                <p class="text-3xl text-gray-900"><?= $house->formatPrice($house->price) ?></p>
              <?php endif; ?>
              <p class="text-gray-700"><?= $house->address ?></p>
            </div>
            <div class="flex p-4 border-t border-gray-300 text-gray-700">
              <p class="flex-1"><span class="text-gray-900 font-bold"><?= $house->bedrooms ?></span> Bedrooms</p>
              <p class="flex-1"><span class="text-gray-900 font-bold"><?= $house->bathrooms ?></span> Bathrooms</p>
            </div>
            <div class="px-4 pt-3 pb-4 border-t border-gray-300 bg-gray-100">
              <div class="text-xs uppercase font-bold text-gray-600 tracking-wide">Realtor</div>
              <div class="flex items-center pt-2">
                <div class="bg-cover bg-center w-10 h-10 rounded-full mr-3" style="background-image: url(<?= $house->realtorPhoto ?>)"></div>
                <div>
                  <p class="font-bold text-gray-900"><?= $house->realtor ?></p>
                  <p class="text-sm text-gray-700"><?= $house->phone ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

  <div id="about"><?= renderAbout() ?></div>

  <section id="contact" class="bg-white -mt-12 py-16">
    <h1 class="text-center uppercase text-black text-4xl font-bold">Contact Me</h1>
    <form class="px-6 pb-12 max-w-2xl mx-auto">
      <input class="w-full border-b-2 border-gray-400 py-6 text-2xl focus:outline-none" type="text" placeholder="Name">
      <input class="w-full border-b-2 border-gray-400 py-6 text-2xl focus:outline-none" type="text" placeholder="Email Address">
      <textarea class="w-full border-b-2 border-gray-400 py-6 text-2xl focus:outline-none" rows="3" placeholder="Message"></textarea>
      <div class="py-5"><button class="bg-green-500 px-8 py-5 rounded-lg text-white">Send</button></div>
    </form>
  </section>

  <section class="bg-gray-800 -mt-12 py-16">
    <div class="flex flex-col md:flex-row text-white text-center">
      <div class="p-6 md:w-1/3">
        <h1 class="uppercase text-2xl font-bold pb-5">Location</h1>
        <p><?= $location ?></p>
      </div>
      <div class="p-6 md:w-1/3">
        <h1 class="uppercase text-2xl font-bold">Around the web</h1>
      </div>
      <div class="p-6 md:w-1/3">
        <h1 class="uppercase text-2xl font-bold pb-5">About freelancer</h1>
        <p class="text-xl">Freelance is a free to use, MIT licensed Tailwindcss theme created by
          <a class="text-green-500" href="https://twitter.com/framansi">Francesco Mansi</a></p>
      </div>
    </div>
  </section>
</main>
<footer class="bg-gray-900 h-16">
  <!-- Завдання 4. Поточний рік -->
  <p class="pt-5 text-center text-white">Copyright © Your Website <?= date('Y') ?></p>
</footer>
</body>
</html>
