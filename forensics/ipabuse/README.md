# Challenge

**Name:** IP Abuse

**Category:** forensics

**Author:** Alex Brown (ghostccamm)

**Flag:** `CTF{egypt-protonvpn}`

## **Description:**

We have received an alert about a suspicious SSH login into one of our IT accounts from the IP address **`188.214.122.83`**. We do know that they are away on holiday in Europe and they should be using the company's NordVPN for connecting to the internet, so it could be them connecting remotely to do some work. We have tried calling and emailing them to confirm, but they have not been returning any of our messages.

Can you collect evidence about the country of origin and the VPN company associated to the IP address **`188.214.122.83`**? If it isn't a country in Europe and using NordVPN then we will escalate the alert to an incident.

The flag is in the following format:

```
CTF{<country>-<VPN>}
```

For an example, `CTF{germany-nordvpn}` is a valid answer.

## **Solution:**

First let's check [AbuseIPDB](https://www.abuseipdb.com/) to see if the IP address has been reported as malicious. We can see that it has not been reported as malicious, but the country of origin is **Egypt** which is suspicious. Checking the whois records do not indicate the VPN company that owns the IP address. However, googling 'VPN 188.214.122.83' shows results that claim it is associated to **Proton VPN**.

Final flag is `CTF{egypt-protonvpn}`
