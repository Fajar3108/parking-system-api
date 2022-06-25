# Overview

This application provides several parking blocks, each parking block has a certain number of parking slots. Each parking slot on the block will be filled as more vehicles are parked and will be empty again when the parked vehicle exits

# Installation

<ol>
    <li>Clone this Project</li>
    <li>Install depedencies (composer install)</li>
    <li>Setup .env file and database</li>
    <li>migrate and seed (php artisan migrate --seed)</li>
</ol>

# Usage

### Base URL: {host}/api

---

### Get All Blocks

---

#### Request

| Method | Endpoints |
| ------ | --------- |
| GET    | /blocks   |

#### Response

```
[
    {
        id: integer,
        code: string,
        total_slots: integer,
        avaible_slots: integer,
    },
    ...
]
```

---

### Get Detail Block Information

---

#### Request

| Method | Endpoints          |
| ------ | ------------------ |
| GET    | /blocks/{block_id} |

#### Response

```
{
    id: integer,
    code: string,
    total_slots: integer,
    avaible_slots: integer,
    slots: [
        {
            id: integer,
            number: integer,
            is_avaible: boolean,
        },
        ...
    ]
},
```

---

### Start Parking

---

#### Request

| Method | Endpoints      |
| ------ | -------------- |
| POST   | /start-parking |

#### Body

```
{
    slot_id: integer,
    vehicle_number: string,
}
```

#### Response

```
{
    success: boolean,
    message: string,
},
```

---

### Stop Parking

---

#### Request

| Method | Endpoints     |
| ------ | ------------- |
| PATCH  | /stop-parking |

#### Body

```
{
    slot_id: integer,
}
```

#### Response

```
{
    success: boolean,
    message: string,
},
```
