





該專案主要用於練習 Laravel CRUD



[TOC]

# 專案起因

由於自己想做一個台灣影音串流平台整合的查詢功能，藉由 Python + Laravel 練習，希望可以打造自動化整合的平台。



# 專案內容

* Laravel 5.8
* Laravel 專案設定（config/app.php），設定語系、時區
* 資料表與資料（migration、seeder）、Model
* Route 與 Controller，規劃分成前台、後台
* Laravel Mix 打包 CSS / JS 套件，有使用到 Bootstrap、Font Awesome
* 撰寫表單 HTML 使用到 laravelcollective/html 套件
* 表單驗證
* 開啟分頁功能，對列表做分頁
* 開啟認證功能，登入後才能進後台新增、編輯或刪除資料
* Flash Message，使用到 laracasts/flash 套件
* 使用 Python 爬取串流平台資料
* demo 部署至 Heroku





# 其他相關參考資料

## Laravel 專案相關

* 刪除按鈕，使用 JS 方式實作：[CRUD: How to avoid building whole Form for Delete button - Laravel Daily](https://laraveldaily.com/crud-how-to-avoid-building-whole-form-for-delete-button/)
* 表單驗證 3 種寫法：[Laravel 使用 validate 進行參數驗證 - HackMD](https://hackmd.io/@8irD0FCGSQqckvMnLpAmzw/HJ1LqggUQ?type=view)



## 相關影音資料庫

### 國內外串流影片資料庫

* [awwrated](https://awwrated.com/)：專注於台灣 Netflix 片單
* [追劇衛星](https://dramas.com.tw/)：專注於台灣 Netflix 片單（日後還會有 Amazon Prime Video、Apple TV+ 等平台）
* [uNoGS](https://unogs.com/)：多國 Netflix 片單（不包括台灣）
* [JustWatch](https://www.justwatch.com/)：多國串流平台片單（不包括台灣）

### 國內外影音資料網站

* 開眼電影：http://www.atmovies.com.tw/
* 電影神搜：https://www.agentm.tw/
* 98yp：https://www.98yp.net/
* 影劇資料-DramaQueen電視迷：https://www.dramaqueen.com.tw/tvshow
* 世界電影雜誌：https://www.worldscreen.com.tw/
* Yahoo 奇摩電影：https://movies.yahoo.com.tw/
* IMDb：https://www.imdb.com/
* TMDb：https://www.themoviedb.org/
* 豆瓣电影：https://movie.douban.com/



# 專案後續

實作過後，有一些問題或功能待改善...

* 潛在的一些問題
  - 串流平台標示的資料有誤（年份、英文片名），在爬取時難以對到 IMDb 資料，這部分需人工校對
  - 串流平台的分類（電影、影劇）不是很明確，有些平台會將影劇各集拆開成一部一部的電影
  - 串流平台的上架、下架時間，不是每個平台都有註記該資料
* 加強或改善的功能
  * 影片的國家、類型等分類，這些資料的取得可能來自 IMDb 或各個影音平台，整合上需多加考慮
  * 外連或提供評分、影評等功能，這就非常依靠外連資料庫（IMDb）的準確性
  * 目前可爬取 Hami Video、friDay 影音、myVideo 的電影資料，而影劇資料以及其他平台則需要再研究
  * 部署服務、定期爬蟲架設，也需要再研究

另外，前端部分的 CSS / JavaScript 還在學習，現在頁面還顯得非常非常單薄，且很多網頁功能可能需要 JavaScript 實作會來得容易。

整合台灣的串流平台是有點挑戰性的，大部分是因為在地化資料（中文片名）難以對應英文片名，這邊希望有心人可以協助編輯 [TMDb 資料庫](https://www.themoviedb.org/)，該資料庫完全免費開放使用者編輯的（比 IMDb 好編輯），協助編輯台灣繁體（zh-TW）的頁面，以補齊中文對應英文的缺口。

