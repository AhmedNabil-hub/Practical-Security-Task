def encrypt(plainText, s):
    result = ""

    for i in range(len(plainText)):
        char = plainText[i]

        result += chr((ord(char) + s - 65) % 26 + 65)

    return result


def decrypt(cipherText, s):
    result = ""

    for i in range(len(cipherText)):
        char = cipherText[i]

        result += chr((ord(char) - s - 65) % 26 + 65)

    return result


if __name__ == '__main__':
    key = input('Enter your key?')
    key = int(key)
    encryptOrNot = input('Encrypt or dycrypt ? e/d').upper()
    if encryptOrNot == 'E':
        text = input('Enter your plain text ?').upper()
        print("Cipher: " + encrypt(text, key))
    else:
        text = input('Enter your cipher text ?').upper()
        print("Text: " + decrypt(text, key))
