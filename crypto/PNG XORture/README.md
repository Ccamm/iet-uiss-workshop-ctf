# Challenge

**Name:** PNG XORture

**Category:** crypto

**Author:** Alex Brown (ghostccamm)

**Flag:** `CTF{1_byt3_x0r_15_b4d!}`

## **Description:**

I have been playing around with using **XOR** to encrypt **PNG images** lately and it seems to be very effective! However, I have horribly short term memory issues so I decided to only use keys that are **1 byte long**.

I have attached one of my encrypted PNG images below, can you find a way to decrypt it?

## **Solution:**

A XOR key is way too short and it can be easily bruteforced to reveal the plaintext. However, the issue here is knowing what is the correct XOR key for a PNG file. PNG files start with the hex values `0x89 0x50 0x4E 0x47 0x0D 0x0A 0x1A 0x0A` or `.PNG....` if we try to convert the hex into printable text. Seeing this, we can tell that we can use the word `PNG` as a 'crib' that we search for when trying to bruteforce the XOR key.

Here is the [CyberChef recipe](https://gchq.github.io/CyberChef/#recipe=XOR_Brute_Force(1,100,0,'Standard',false,true,false,'PNG')) that reveals that the key was `0x45` in hex. Using this key, we can then decrypt the image on CyberChef, download it and view the image to get the flag.
