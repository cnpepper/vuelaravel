FORMAT: 1A

# APIDoc

# Api [/mysql]
数据库模块

## 查询SQL语句 [POST /mysql/query]
查询用户提交的SQL语句。

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