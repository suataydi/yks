import json

def handler(event, context):
    messages = [{"username": "user1", "text": "Merhaba!"}]
    response = {
        "statusCode": 200,
        "body": json.dumps({"messages": messages})
    }
    return response
