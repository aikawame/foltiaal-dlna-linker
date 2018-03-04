# DLNA Linker for foltia ANIME LOCKER

DLNA Linkerは、foltia ANIME LOCKERにおけるDLNAの階層構造として、番組別のものを生成するスクリプトです。

- 通常パス：01-全録画/2018/01/MP4-HD/0107-1900_コードギアス 反逆のルルーシュR2_4_逆襲 の 処刑台_HD_432431.MP4
- 生成パス：99-番組別/コードギアス 反逆のルルーシュR2/4.逆襲 の 処刑台.MP4

## 使用方法

### 下準備

SCP等でfoltiaALのサーバーにスクリプトを設置してください。

```
scp dlna_linker.php foltia@foltia.local:
```

### 実行

当月分の番組を生成する場合は、単にスクリプトを実行します。

```
php dlna_linker.php
```

年月を指定することもできます。

```
php dlna_linker.php 201801
```

### crontabへの登録例

```
(crontab -l; echo "10,40 * * * * /usr/bin/php /home/foltia/dlna_linker.php >/dev/null 2>&1") | crontab -
```
