db = db.getSiblingDB('myapp'); // this creates a new DB "myapp"

db.users.insertMany([
  { name: "Alice", email: "alice@example.com", age: 28 },
  { name: "Bob", email: "bob@example.com", age: 35 },
  { name: "Charlie", email: "charlie@example.com", age: 22 }
]);