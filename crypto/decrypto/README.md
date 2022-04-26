# Challenge

**Name:** decrypto

**Category:** crypto

**Author:** Alex Brown (ghostccamm)

**Flag:** `CTF{y0u_c4n_d3cRiPt_d4h_a35!11!}`

## **Description:**

My friend gave me the following ciphertext encoded in hex and told me to decrypt it.

```
0a82bd841d6d116ba586a8f26b52e9ddf1d6eedad5911bec5b95f85e33b5cee0
```

They told me that they used AES with the OFB mode, with the key `69696969696969696969696969696969` and initial vector `4204204204204204204204204204269` both in hex.

Problem is I don't know anything about cryptography! Can you help me decrypt their message?

## **Solution:**

You can use [CyberChef](https://gchq.github.io/CyberChef/#recipe=AES_Decrypt(%7B'option':'Hex','string':'69696969696969696969696969696969'%7D,%7B'option':'Hex','string':'4204204204204204204204204204269'%7D,'OFB','Hex','Raw',%7B'option':'Hex','string':''%7D,%7B'option':'Hex','string':''%7D)&input=MGE4MmJkODQxZDZkMTE2YmE1ODZhOGYyNmI1MmU5ZGRmMWQ2ZWVkYWQ1OTExYmVjNWI5NWY4NWUzM2I1Y2VlMA) to decrypt AES-OFB with the key and initial vector provided to get the flag.
