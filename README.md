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
| **Mnemonic Code** | **Description** | **Type** | **Size** | **Comment** |
|-------------------|-----------------|----------|----------|-------------|
| id_game            | Game identifier | N        | 1O       | Unsigned    |
| name_game          | Name for a game | AN       | 50       |             |
| picture_game       | Picture for game| AN       | 50       |             |
| description_game   | game description| AN       | 1000     |             |
| release_game       | release date for a game| DATE | 10    | French format|








