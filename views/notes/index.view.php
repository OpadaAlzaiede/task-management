<?php require base_path('views/partials/banner.php'); ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div>
            <p class="mb-5">
                <a href="/notes/create" class="text-blue-500 hover:underline">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                </a>
            </p>
        </div>

        <ul class="mt-6">
            <?php foreach ($notes as $note):  ?>
              <div class="mt-5">
                  <li>
                      <a href="note?id=<?= $note['id']?>" class="text-blue-500 hover:underline">
                          <?= htmlspecialchars($note['title']) ?>
                      </a>
                  </li>
                  <p class="text-gray-700 text-base">
                      <?= htmlspecialchars($note['body']) ?>
                  </p>
              </div>
            <?php endforeach; ?>
        </ul>
    </div>
</main>

<?php require base_path('views/partials/footer.php'); ?>
