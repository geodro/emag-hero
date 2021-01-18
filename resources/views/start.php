<div class="grid lg:grid-cols-2 gap-4 mb-4">
    <?php echo \Core\View::partial('creature', [
            'creature' => $game->getOrderus()
    ]); ?>
    <?php echo \Core\View::partial('creature', [
        'creature' => $game->getBeast()
    ]); ?>
</div>

<div class="bg-gray-50 shadow rounded-lg">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
        <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
            <span class="block">Orderus encouter a beast</span>
        </h2>
        <div class="mt-8 lex lg:mt-0 lg:flex-shrink-0">
            <div class="inline-flex rounded-md shadow">
                <a href="/battle" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                    Fight
                </a>
            </div>
        </div>
    </div>
</div>