document.getElementById('btn-encrypt').addEventListener("click", encrypt);
document.getElementById('btn-decrypt').addEventListener("click", decrypt);

const ALPHABET = [
  'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 
  'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 
  'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
];

function encrypt() {
  var key_a = parseInt(document.getElementById("key-a").value);
  var key_b = parseInt(document.getElementById("key-b").value);
  var plain_text = (document.getElementById("input-text").value).toUpperCase();
  var cipher_text = "";

  for (let i = 0; i < plain_text.length; i++) {
    var index = mod(key_a * ALPHABET.indexOf(plain_text[i]) + key_b, 26);
    cipher_text += ALPHABET[index];
  }

  document.getElementById("output-text").value = cipher_text;
}

function decrypt() {
  var key_a = parseInt(document.getElementById("key-a").value);
  var key_b = parseInt(document.getElementById("key-b").value);
  var cipher_text = document.getElementById("input-text").value;
  var plain_text = "";
  var inverse_a = modInverse(key_a, 26);

  for (let i = 0; i < cipher_text.length; i++) {
    var index = mod(inverse_a * (ALPHABET.indexOf(cipher_text[i]) - key_b), 26);
    plain_text += ALPHABET[index];
  }

  document.getElementById("output-text").value = plain_text;
}

function mod(num, m) {
  return ((num % m) + m) % m;
}

function modInverse(a, m) {
  for(let i = 1; i < m; i++) {
    if (((a % m) * (i % m)) % m == 1){
      return i;
    }
  }
}
