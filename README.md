# Elastic examples

Usage examples examples. Implemented features:

- Creating indexes/mappings.
- Import data into Elastic
- Basic search example
- Fuzzy search example
- Filters example
- Facets examples(aggregations - distinct, min/max)
- Search with synonyms
- Dynamic update index settings(open/close index)
- Search query highlight
- Morphology/Stop Words examples(English, Russian)
- Search suggest example
- Ingest plugin examples - upload binary files(doc, docx, xls, xlsx, ppt, pptx, pdf, txt) 
to elastic, search by content

https://github.com/antonshell/elastic_examples/blob/master/postman/Elastic_Demo.postman_collection.json

## Install

1 . Clone repository

```
https://github.com/antonshell/elastic_examples.git
```

2 . Create configs

cp _config.php.dist _config.php
cp docker-compose.yml.dist docker-compose.yml

3 . 

## Examples

Postman collection is here:
https://github.com/antonshell/elastic_examples/blob/master/postman/Elastic_Demo.postman_collection.json
Examples scripts located in ```demo``` folder

### Create Index

Create index/mapping demo

```
php demo/01_create_index.php
```

### Push Data

Push posts/products data to elastic

```
php demo/02_push_data.php
```

### Get all data

Get all posts

```
php demo/03_get_all.php
```

### Get By ID

Get single post

```
php demo/04_get_by_id.php 1
```

### Search

Simple search by keyword

```
php demo/05_search.php "компиляторы"
```

### Search + Fuzzy

Fuzzy search. Error "компидяторы" -> "компиляторы". Should find one record

```
php demo/06_search_fuzzy.php "компидяторы"
```

### Filters

Apply filters: vendor = "Intel", cheaper then 400$, frequency between 3.2 and 3.6 

```
php demo/07_filters.php
```

### Aggregations

Get agregated data: min/max, distinct

```
php demo/08_aggregation.php
```

### Synonyms

Search by synonyms: "легальный" -> "законный"

```
php demo/09_search_synonyms.php легальный
```

### Dynamic Index

Update synonyms without recreate index

```
php demo/10_dynamic_index.php
```

### Search Highlight

Highlight search query with <em> tags

```
php demo/11_search_highlight.php Sony
```

### Search Suggest

Implement search suggests.
Typing "маш", would show "Стековая машина ..."

```
php demo/12_search_suggest.php "Стековая маш"
```

### Search Morphology + Stop Words

Morphology for russian/english.
Searching by keyword "рейтинговый" should return record, that contains word "рейтингах"
Searching by keyword "более" should return nothing, because it is stopword

```
php demo/13_search_morfology_stop_words.php рейтинговый
```

### Ingest Push Data

Import binary documents to elastic.
Supported formats: doc, docx, xls, xlsx, ppt, pptx, pdf, txt
Maybe some other. Documents uploaded in base64 format.

```
php demo/14_ingest_push_data.php
```

### Ingest Search

Search by uploaded binary documents

```
php demo/15_ingest_search.php "Европейский"
```
