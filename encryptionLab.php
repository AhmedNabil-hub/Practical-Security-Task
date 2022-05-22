<?php

$pageTitle = 'Encryption Lab';

include './backend/init.php';
?>

<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-2">

              <h2 class="fw-bold mb-2 text-uppercase">Let's Encrypt</h2>
              <p class="text-white-50 mb-5">Affine Ceaser Cipher</p>

              <div class="form-outline form-white mb-4 d-flex justify-content-between">
                <input type="text" class="w-25 form-control form-control-lg custom-input" placeholder="Key" disabled />
                <input type="text" id="key-a" class="w-50 form-control form-control-lg custom-input" placeholder="A" name="key-a" required />
                <input type="text" id="key-b" class="w-50 form-control form-control-lg custom-input" placeholder="B" name="key-b" required />
              </div>

              <div class="form-outline form-white mb-4">
                <input type="text" id="input-text" class="form-control form-control-lg custom-input" placeholder="Input Text" name="input-text" required />
              </div>

              <div class="form-outline form-white mb-4">
                <input type="text" id="output-text" class="form-control form-control-lg custom-input" placeholder="Output Text" name="output-text" disabled />
              </div>

              <button id="btn-encrypt" onclick="encrypt()" class="btn btn-outline-light btn-lg px-5 mt-4" type="submit">Encrypt</button>
              <button id="btn-decrypt" onclick="decrypt()" class="btn btn-outline-light btn-lg px-5 mt-4" type="submit">Decrypt</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
include $layouts . 'footer.php';
?>
