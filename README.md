# Laravel 7 使用 JSON Web Token 驗證的具象狀態傳輸應用程式介面

引入 tymon 的 jwt-auth 套件來擴增實作有限時間內可利用認證令牌要求對應的操作權限的方法，認證令牌就像通行證，保全會看通行證決定你能不能進出某些場所。

## 使用方式
- 把整個專案複製一份到你的電腦裡，這裡指的「內容」不是只有檔案，而是指所有整個專案的歷史紀錄、分支、標籤等內容都會複製一份下來。
```sh
$ git clone
```
- 將 __.env.example__ 檔案重新命名成 __.env__，如果應用程式金鑰沒有被設定的話，你的使用者 sessions 和其他加密的資料都是不安全的！
- 當你的專案中已經有 composer.lock，可以直接執行指令以讓 Composer 安裝 composer.lock 中指定的套件及版本。
```sh
$ composer install
```
- 產⽣ Laravel 要使用的一組 32 字元長度的隨機字串 APP_KEY 並存在 .env 內。
```sh
$ php artisan key:generate
```
- 執行 __Artisan__ 指令的 __migrate__ 來執行所有未完成的遷移。Passport 服務提供者在框架中已註冊好本身的資料庫遷移目錄，所以你應該在遷移資料庫之後註冊這個提供者。Passport 的遷移檔會建立應用程式需要儲存客戶端與 Access Token 的資料表。
```sh
$ php artisan migrate
```
- 在瀏覽器中輸入已定義的路由 URL 來訪問，例如：http://127.0.0.1:8000。
- 你可以經由 `/api/register` 來進行註冊使用者；經由 `/api/login` 來進行使用者登入；只能在本地環境經由 `/api/task` 來進行任務瀏覽。

----

## 畫面截圖
![](https://i.imgur.com/G6HcroA.png)
> 傳送 HTML 表單資料註冊建立使用者，即可取得認證令牌

![](https://i.imgur.com/4VrotPW.png)
> 傳送 HTML 表單資料使用建立使用者來做登入，即可取得認證令牌

![](https://i.imgur.com/vHPL1yQ.png)
> 傳送 HTML 表單資料提供令牌作身份認證，在有限的時間內，可以使用這個令牌作指定的操作或請求，不需要再重複做登入的動作