import requests

app_id = "2193426784384565"
app_secret = "a51e3634f852d68ff53299301f170a4f"
short_lived_token = "EAAfK6PhS9jUBOyYF9y9H1dlxVJdahWS37RnGKvpWaVveY7SoYEF1hiMYCopcW8ZBdOa2czDaWRr5zToAKN8xjG5IZAXPUAMchlpEUpBoJh0Ey8XbIHLGZCJm0yiMeEiZArNMlPAZAYCGlqh0ci37iC6M5h5cGEnVjHnBLIVzzeBZCbD0dYtqtivHBc1gPYJMQjUt080jWXsaMVo9brqQQZAIHrGiom4uQ2vpZAE3FWCD"

url = "https://graph.facebook.com/v17.0/oauth/access_token"
params = {
    "grant_type": "fb_exchange_token",
    "client_id": app_id,
    "client_secret": app_secret,
    "fb_exchange_token": short_lived_token
}

response = requests.get(url, params=params)
data = response.json()

if "access_token" in data:
    print("Long-lived token:", data["access_token"])
else:
    print("Error:", data)
