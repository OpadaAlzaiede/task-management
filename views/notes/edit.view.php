
<?php require base_path('views/partials/banner.php'); ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <form method="POST" action="/note?id=<?= $note['id'] ?>">
            <input hidden name="_method" value="PATCH">
            <input hidden name="id" value="<?= $note['id'] ?>">
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="col-span-full">
                            <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                            <?php if (isset($errors['title'])) : ?>
                                <?php foreach ($errors['title'] as $error) :?>
                                    <li class="text-red-500 text-xs mt-2"> <?=$error?> </li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <div class="mt-2">
                                <input id="title"
                                       name="title"
                                       class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                       value="<?= isset($_POST['title']) ? $_POST['title'] : $note['title']?> "
                                />
                            </div>
                        </div>

                        <div class="col-span-full">
                            <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                            <?php if (isset($errors['body'])) : ?>
                                <?php foreach ($errors['body'] as $error) :?>
                                    <li class="text-red-500 text-xs mt-2"> <?=$error?> </li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <div class="mt-2">
                                <textarea id="body"
                                          name="body"
                                          rows="3"
                                          class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                >
                                    <?= isset($_POST['body']) ? $_POST['body'] : $note['body'] ?>
                                </textarea>
                            </div>
                            <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences about your note.</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="/notes">
                    <button type="button" title="cancel" class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </a>
                <button type="submit" title="save"  class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                    </svg>
                </button>
            </div>
        </form>

    </div>
</main>

<?php require base_path('views/partials/footer.php'); ?>
