import json

def handler(event, context):
    body = json.loads(event['body'])
    username = body.get("username")
    password = body.get("password")

    if username and password == "197346":
        response = {
            "statusCode": 200,
            "body": json.dumps({"message": "Başarıyla giriş yapıldı"})
        }
    else:
        response = {
            "statusCode": 401,
            "body": json.dumps({"message": "Hatalı giriş"})
        }

    return response
