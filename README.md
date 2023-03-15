# get_psn_library

## Data Conceptual Model
### Management rules 
* A game has an identifier, a name, an image, a description, a release date, and a start date for gamers
* A game has a completion percentage
* **A game has at least one category**
* A category has an identifier
* A category has a name
* **A game has at least one platform**
* A platform has an identifier
* A platform has a name
* **A game has at least one getting condition**
* A getting condition has an identifier
* A getting condition has a name

### Data dictionary

| **Mnemonic Code** | **Description**            | **Type** | **Size**   | **Comment**   |
|--------------------|---------------------------|----------|------------|---------------|
| id_game            | Game identifier           | N        | 10         | *Unsigned*    |
| name_game          | Name for a game           | N        | 50         |               |
| picture_game       | Picture for game          | AN       | 50         |               |
| description_game   | game description          | AN       | 1000       |               |
| release_game       | release date for a game   | DATE     | 10         | *Fr format*   |
| start_date_game    | Start date for a user     | DATE     | 10         | *Fr format*   |
| id_category        | Category identifier       | N        | 10         | *Unsigned*    | 
| name_category      | Name for a category       | AN       | 10         |               |
| id_platform        | Platform identifier       | N        | 10         | *Unsigned*    |
| name_platform      | Name for a platform       | AN       | 10         |               |
| id_getting         | Identifier for getting    | N        | 10         | *Unsigned*    |
| name_getting       | Name for get condition    | AN       | 10         | *How I got*   |



### Functional depedence

* <ins>id_game</ins> ? name_game, picture_game, description_game, release_game, start_date_game
* 








