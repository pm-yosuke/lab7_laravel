# lab7_laravel

## Usage

### コンテナの立ち上げ

```shell
git clone git@github.com:pm-yosuke/lab7_laravel.git
cd lab7_laravel
git checkout -b 58/master origin/58/master
docker-compose up -d
```

### 初めてLaravelをインストールする場合

```shell
docker-compose exec lab7.laravel.php composer create-project --prefer-dist laravel/laravel . "5.8.*"
``````

### 既にLaravelはインストール済みで必要なモジュールだけをインストールしたい場合

```shell
docker-compose exec lab7.laravel.php composer install
cp html/.env.example html/.env
docker-compose exec lab7.laravel.php php artisan key:generate
```

### storageのパーミッションを変更（Linux環境のみ）
```shell
chmod 777 -R html/storage
```

### 画面のビルド
```shell
cd html
yarn
yarn run dev
```


### URL

http://localhost:8080/


## 画面遷移図

https://xd.adobe.com/view/f9358459-5f3e-4b15-5f09-2550a975abbc-8f04

これをつくるという体でAPIを作る練習をします。

## API設計図

https://app.swaggerhub.com/apis/taichi0529/laravel_class/1.0.0#/