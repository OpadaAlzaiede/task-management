
<?php require base_path('views/partials/banner.php'); ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

       <div>
           <p class="mb-5">
               <a href="/notes" class="text-blue-500 underline">
                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                       <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                   </svg>
               </a>
           </p>
           <div class="max-w-sm rounded overflow-hidden shadow-lg">
               <div class="px-6 py-4">
                   <p class="text-blue-500">
                       <?= htmlspecialchars($note['title']) ?>
                   </p>
                   <p>
                       <?= htmlspecialchars($note['body']) ?>
                   </p>
               </div>
               <div class="px-6 pt-4 pb-2 flex">
                   <form method="POST" class="mt-6">
                       <input hidden name="_method" value="DELETE">
                       <input hidden type="text" name="id" value="<?= $note['id'] ?>">
                       <button type="submit" class="text-sm text-red-500">
                           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                               <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                           </svg>
                       </button>
                   </form>
                   <div class="mt-6 ml-6">
                       <a href="/note/edit?id=<?= $note['id'] ?>">
                           <button type="submit" class="text-sm text-blue-500">
                               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                   <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                               </svg>
                           </button>
                       </a>
                   </div>
               </div>
           </div>
       </div>

    </div>
</main>

<?php require base_path('views/partials/footer.php'); ?>
