<div class="grid lg:grid-cols-2 gap-4">
    <?php echo \Core\View::partial('creature', [
        'creature' => $game->getOrderus()
    ]); ?>
    <?php echo \Core\View::partial('creature', [
        'creature' => $game->getBeast()
    ]); ?>
</div>

<!-- This example requires Tailwind CSS v2.0+ -->
<div class="bg-white shadow overflow-hidden sm:rounded-lg my-4">
    <div class="px-4 py-5 sm:px-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Battle log
        </h3>
    </div>
    <div class="border-t border-gray-200">
        <dl>
            <?php foreach ($game->getFights() as $key => $message) { ?>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    Fight <?php echo $key + 1 ?>
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <?php echo $message ?>
                </dd>
            </div>
            <?php } ?>
        </dl>
    </div>
</div>
<?php if (!$game->finished()) { ?>
<div class="bg-gray-50">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
        <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
            <span class="block">Fight <?php echo $fight; ?></span>
            <span class="block text-indigo-600">Orderus is battling a beast</span>
        </h2>
        <div class="mt-8 lex lg:mt-0 lg:flex-shrink-0">
            <div class="inline-flex rounded-md shadow">
                <a href="/battle?fight=<?php echo $fight+1; ?>" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                    Next fight
                </a>
            </div>
        </div>
    </div>
</div>
<?php } ?>

