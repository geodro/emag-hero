<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="data:;base64,iVBORw0KGgo=">

    <title>Hero Game</title>

    <!--STYLESHEET-->
    <!--=================================================-->

    <link href="/css/app.css" rel="stylesheet">
</head>

<body>
<div>
    <nav class="bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <img class="h-8 w-8" src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg"
                             alt="Workflow">
                    </div>
                    <div class="block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <a href="/"
                               class="<?php if (!\Core\Http\Route::is('')) { ?>hover:<?php } ?>bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium">Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <main>
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <?php echo \Core\View::partial($view, $args); ?>
        </div>
        <footer class="block py-4">
            <div class="container mx-auto px-4">
                <hr class="mb-4 border-b-1 border-gray-300">
                <div class="flex flex-wrap items-center md:justify-between justify-center">
                    <div class="w-full md:w-4/12 px-4">
                        <div class="text-sm text-gray-600 font-semibold py-1">Copyright © <!-- -->2021
                            <!-- --> <a href="https://george.dumitres.co"
                                        class="text-gray-600 hover:text-gray-800 text-sm font-semibold py-1"
                                        target="_blank">George Dumitrescu</a></div>
                    </div>
                    <div class="w-full md:w-8/12 px-4">
                        <ul class="flex flex-wrap list-none md:justify-end  justify-center">
                            <li><a href="https://george.dumitres.co"
                                   class="text-gray-700 hover:text-gray-900 text-sm font-semibold block py-1 px-3"
                                   target="_blank">george.dumitres.co</a></li>
                            <li><a href="https://github.com/geodro"
                                   class="text-gray-700 hover:text-gray-900 text-sm font-semibold block py-1 px-3"
                                   target="_blank">github</a></li>
                            <li><a href="https://www.linkedin.com/in/geodro"
                                   class="text-gray-700 hover:text-gray-900 text-sm font-semibold block py-1 px-3"
                                   target="_blank">linkedin</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </main>
</div>
</body>
</html>
