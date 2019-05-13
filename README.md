# R2-D2 Death star
![alt text](https://memegenerator.net/img/instances/38128026/may-the-code-be-with-you.jpg)
- System for support R2D2 in his battle.
- Based on Porto (Software Architectural Pattern) https://github.com/Mahmoudz/Porto
- APIATO https://github.com/apiato/apiato

# Requirements
- Docker
- Ports 3306, 80, 443 should be available on your host machine, stop your local mysql, nginx

#Installation
```
git clone git@github.com:denis019/death-star.git
cd death-star/Docker/
./setup.sh
```
You will get in the console something as following
```
Client ID: 1
Client Secret: fNJoouKQJrmV3EKh4fpjcxztzl8GGGEUz8pMTYXQ
```
Use this credentials to obtain access token

Edit your local hosts
```
127.0.0.1 death.star.api
```
# API:
- POST /v1/token
```
Headers
```
```
Accept:application/json
Content-Type:application/json
```
```
Payload
```
```
{
    "client_secret":"1T2aqpGNHfNB642KShcxI5iEssK0Nx8OQEYYQwjE",
    "client_id":"1"
}
```

```
Response
```
```
{
    "token_type": "Bearer",
    "expires_in": 31622396,
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImZmOWE5ZjFjNzcwNTdmNDk5MTYxZTIwZmJiMDJmMTdhOTZkMGU2ZjRlNTUyNWU5MGE0NmMxMTBlZjNkYmFlMmRmZDQxZTAyMGMzMmY4MzYwIn0.eyJhdWQiOiIxIiwianRpIjoiZmY5YTlmMWM3NzA1N2Y0OTkxNjFlMjBmYmIwMmYxN2E5NmQwZTZmNGU1NTI1ZTkwYTQ2YzExMGVmM2RiYWUyZGZkNDFlMDIwYzMyZjgzNjAiLCJpYXQiOjE1NTc3NzQxMjksIm5iZiI6MTU1Nzc3NDEyOSwiZXhwIjoxNTg5Mzk2NTI5LCJzdWIiOiIxIiwic2NvcGVzIjpbIlRoZUZvcmNlIl19.OaPDMwafGyQpDkN04Ezf6ATq37QE5VwGvx80Wmfk_u9OVhVgTHHGc-3JneKaYmNM-koXjtmT996JmhIZT-qvlRetaX1ySowf_lSRNdOAo7zJeAHrfc7Nkq8hCMRjq0xJvppEmlFF0tezO7l1Dd4AES9EzdEUG4VYDiact5c_sk8RjEiLoTUN-Oxw89yGpQpDmg8k4KEUJhDVV_dzaysmade-6GeHUoZ_2Ls72jtDKDVyuzSRY2ANdN1J5EFumxU4HqQFfoESV25BZaHFWTQAIVlYGdCO6izMZxKWRbI1-ta2-pWU4lbS4OQztJUTkYgtk_kby7q-qmYq-9re0wLT9n8UExzWW2ZmP3h_HLiLvVYDO1qFFL0YSEdJy0wxWP4KI4fhfjQX0Te-ruztKPOegq8NUV4k5YQpoxLLyeBTSzpwuU-QJiqd_LzPoL-2PSXG1zXeeYeeYczeRSSsKvFQ1xVd361hBSoEZnw94BaWyPQFfrBX5SVSZtMQ4Xw2kTSC5PzHmYuLsFW-3S4JwF2dPthlc73NOeV5v_rx7jIzEQXVD9tqMjRi3Y-GXtLP2qgxJ8soAxGvtmNkpQ4Oo9ghEKNpl3rDpGUO8SB-WzpJMCSRTrjPY_BrDzGr8N0awZAFVx7NAVXlmyzMXLx73n-RsSb2RoPVnyn7YAO-5rvWqT8",
    "scope": "TheForce"
}
```
- DELETE/v1/reactor/exhaust/{id}
```
Headers
```
```
Authorization:Bearer token
Accept:application/json
Content-Type:application/json
X-Torpedoes:2
```
- GET /v1/prisoner/{username}
```
Headers
```
```
Authorization:Bearer token
Accept:application/json
Content-Type:application/json
X-Torpedoes:2
```
```
Response
```
```
{
    "cell": "1000011 1100101 1101100 1101100 100000 110010 110001 110011 110010",
    "block": "1000100 1100101 1110100 1100101 1101110 1110100 1101001 1101111 1101110 100000 1000010 1101100 1101111 1100011 1101011 100000 1010010 1000100 101101 110001 110000 110010 110100"
}
```
If you are using postman import:
- [Postman Collections](postman/Death%20Star.postman_collection.json)
- [Postman Environment](postman/Death%20Start.postman_environment.json)

# Tests
- Run tests
```
docker exec ds_php_fpm ./vendor/bin/phpunit
```