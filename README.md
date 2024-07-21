# Telegram bot reverse proxy
This PHP script is designed for setting up a reverse proxy for a Telegram bot. With this script, you can deploy the proxy on a low-cost, non-Iranian hosting service using cPanel, Plesk, or DirectAdmin, and use your own domain as the Telegram base URL, circumventing server sanctions in Iran.

## Deployment Instructions
1. Deploy the project on your host with a domain (e.g., `mydomain.com`).
2. Use `mydomain.com` as your base URL instead of `api.telegram.org` in your application that communicates with Telegram bots.

### Example
Instead of using:
```https://api.telegram.org/bot1234567890:XXXXXXXXXXXXXXXXXXXXXXXXXX/sendMessage?text=Hello&chat_id=123456789```
Use:
```https://mydomain.com/bot1234567890:XXXXXXXXXXXXXXXXXXXXXXXXXX/sendMessage?text=Hello&chat_id=123456789```


Feel free to reach out for further assistance or contribute to the project!
