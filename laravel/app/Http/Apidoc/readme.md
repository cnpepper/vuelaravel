FORMAT: 1A

# Example

# Users [/users]
用户资源标识

## 注册用户 [POST /users]
使用 `username` 和 `password` 注册用户。

+ Parameters
    + page: (string, optional) - The page of results to view.
        + Default: 1
    + limit: (string, optional) - The amount of results per page.
        + Default: 10

+ Request (application/json)
    + Body

            {
                "username": "foo",
                "password": "bar"
            }

+ Response 200 (application/json)
    + Body

            {
                "id": 10,
                "username": "foo"
            }

+ Response 422 (application/json)
    + Body

            {
                "error": {
                    "username": [
                        "Username is already taken."
                    ]
                }
            }