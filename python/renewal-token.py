import requests
import time
import os

# App credentials
APP_ID = "2193426784384565"
APP_SECRET = "a51e3634f852d68ff53299301f170a4f"
LONG_LIVED_USER_TOKEN = "EAAfK6PhS9jUBO20brUcdJkaW6plL6dqJkjdno3safv84QsJDOX0AYo8v9SuRZBe1NT21HqYqBOznsQ9CZCiR8Sv9rThOnAoUHqDaVnCWTKZCZCiwBvcI764lmKbHFjbEVR3vP5r7r9InxsAGgrZBK8BXWipr2sQcZCzpZAJZBl9JAS7rs91s2TwzbJqyWc4KP7XwGr1hnJ5xKIL3xR6U"
PAGE_ID = "1544179682509450"  # Your Page ID

# File to store the renewed Page Access Token
TOKEN_FILE = "page_token.txt"

def save_token(token):
    """Save the token to a file."""
    with open(TOKEN_FILE, "w") as f:
        f.write(token)

def load_token():
    """Load the token from a file."""
    if os.path.exists(TOKEN_FILE):
        with open(TOKEN_FILE, "r") as f:
            return f.read()
    return None

def renew_page_token():
    """Renew the Page Access Token."""
    print("Renewing the Page Access Token...")
    url = f"https://graph.facebook.com/v17.0/{PAGE_ID}"
    params = {
        "fields": "access_token",
        "access_token": LONG_LIVED_USER_TOKEN
    }

    response = requests.get(url, params=params)
    data = response.json()

    if "access_token" in data:
        new_token = data["access_token"]
        print("New Page Access Token:", new_token)
        save_token(new_token)
        return new_token
    else:
        print("Error renewing Page Access Token:", data)
        return None

def check_and_renew_token():
    """Check the token's expiration and renew if needed."""
    current_token = load_token() or LONG_LIVED_USER_TOKEN
    url = f"https://graph.facebook.com/debug_token"
    params = {
        "input_token": current_token,
        "access_token": f"{APP_ID}|{APP_SECRET}"
    }

    response = requests.get(url, params=params)
    data = response.json()

    if "data" in data and "expires_at" in data["data"]:
        expires_at = data["data"]["expires_at"]
        current_time = int(time.time())
        time_left = expires_at - current_time

        print(f"Token expires in {time_left // 3600} hours.")
        # Renew the token if less than 7 days left
        if time_left < 7 * 24 * 3600:
            return renew_page_token()
        else:
            print("Token is still valid.")
    else:
        print("Unable to check token expiration:", data)

# Run the token check and renewal process
check_and_renew_token()
