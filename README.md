# Laravel Socialite + Nuxt.js を試した

Nuxt.jsとLaravelを使ってTwitterログイン機能を実装する  
https://qiita.com/hareku/items/ea09602bf40bf0a42040  
この記事の途中のsession部分はSocialiteのstateless()でいいのでは…と思ったので試し。

Twitter APIはもう使いにくいのでQiitaでのOAuthにしている。

## 先に結論としては
stateless()でsessionの確認は無効になるのでsession関連での問題はなくなる。それでも別サイトならCORSは引き続き必要。

## プロジェクト作成
```
laravel new nuxt-socialite-demo && cd $_
yarn create nuxt-app nuxt
```

Laravel内にnuxtディレクトリを作ってる。
nuxt内の`nuxt.config.js`と`package.json`をLaravelのプロジェクト直下に移動。
元の`package.json`は消していい。その他Laravel側のフロントは使わないので消してもいい。

### nuxt.config.js
```
srcDir: './nuxt/',
```
https://ja.nuxtjs.org/api/configuration-srcdir

```
  axios: {
    'host': '127.0.0.1',
    'port': '8000',
    'prefix': '/api',
  },
```
https://axios.nuxtjs.org/options

`php artisan serve`に合わせてる。

## ローカルサーバー
`php artisan serve`と`yarn dev`を両方起動。

http://127.0.0.1:8000/ がLaravel(完全にAPIのみ)。http://127.0.0.1:3000/ がNuxt。
ブラウザで表示するのはNuxtのほう。NuxtからLaravelのAPIを呼ぶ形。
別サイトなのでCORSが必要。
同じサイトで`/api`以下だけLaravelにするとかやりようは色々あるけど今回は軽く試しただけなのでここで終わり。
