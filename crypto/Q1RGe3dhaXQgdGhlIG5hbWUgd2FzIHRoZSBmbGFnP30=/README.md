# Challenge

**Name:** Q1RGe3dhaXQgdGhlIG5hbWUgd2FzIHRoZSBmbGFnP30=

**Category:** crypto

**Author:** Alex Brown (ghostccamm)

**Flag:** `CTF{wait the name was the flag?}`

## **Description:**

I have hidden a flag on the CTF site and **encoded it**! Can you find it?

## **Solution:**

The challenge name is base64 text that can be decoded. You can use [CyberChef](https://gchq.github.io/CyberChef/#recipe=From_Base64('A-Za-z0-9%2B/%3D',true)&input=UTFSR2UzZGhhWFFnZEdobElHNWhiV1VnZDJGeklIUm9aU0JtYkdGblAzMD0) or the following terminal commands to decode the name and get the flag.

```
$ echo Q1RGe3dhaXQgdGhlIG5hbWUgd2FzIHRoZSBmbGFnP30= | base64 -d
CTF{wait the name was the flag?}
```
