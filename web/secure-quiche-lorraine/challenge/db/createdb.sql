CREATE TABLE IF NOT EXISTS "users" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
  "username" VARCHAR,
  "password" VARCHAR
);

CREATE TABLE IF NOT EXISTS "admins" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
  "username" VARCHAR,
  "password" VARCHAR
);

CREATE TABLE IF NOT EXISTS "recipes" (
  "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
  "name" VARCHAR,
  "ingredients" TEXT,
  "instructions" TEXT,
  "image" VARCHAR
);

INSERT INTO "users" ("username", "password") VALUES ("ghostccamm", "thisisasuperlongpasswordthatissupersecureandnobodyaintgonnaguessitlol");
INSERT INTO "admins" ("username", "password") VALUES ("quicheadmin", "mygirlfriendsmumhatesmebecausesometimesiputtomatosauceonquiche...");

INSERT INTO "recipes" ("name", "ingredients", "instructions", "image") VALUES (
    "Quiche Lorraine",
    "
Quiche Crust - choose one:

    ▢ 1 homemade quiche crust (shortcrust pastry)
    ▢ 2 sheets shortcrust , thawed
    ▢ 1 prepared pie shell , fridge or frozen

Bacon Filling:

    ▢ 1 tbsp / 15g butter
    ▢ 1 garlic clove , minced
    ▢ 1/2 onion, finely chopped (~1/2 cup)
    ▢ 200 g / 6.5 oz bacon, cut into small strips

Egg Mixture

    ▢ 4 eggs (~55- 65g / 2 oz each)
    ▢ 1 1/4 cups (300ml) heavy cream (thickened cream) (Note 1)
    ▢ Pinch of salt & pepper

Cheese:

    ▢ 1 1/4 cups (125g) grated gruyere cheese (or tasty, cheddar, monterey jack)

Garnish (optional):

    ▢ 50g / 2 oz bacon, chopped and cooked until golden
    ",
    "
Quiche Crust:

    1. Frozen shortcrust pastry or homemade quiche crust - prepare and bake the crust per Quiche Crust recipe.
    2. Prepared pie shell - bake per packet directions.

Bacon Filling:

    1. Preheat oven to 200C/390F (standard) or 180C/350F (fan / convection).
    2. Melt butter in a skillet over medium high heat. Add onion, garlic and bacon. Cook until bacon is light golden.
    3. Transfer to a paper towel lined bowl and leave to cool.

Egg Mixture:

    1. Place ingredients in a bowl and whisk to combine.

Assembling and Baking:

    1. Place quiche tin with cooked quiche crust on tray. Scatter cooled Bacon Filling evenly across base of cooked quiche crust.
    2. Scatter cheese evenly across top.
    3. Carefully pour Egg mixture over the top. Push some of the cheese/bacon below the surface.
    4. Bake for 35 - 40 minutes until the top is golden. The centre should still jiggly.
    5. Garnish with Extra Bacon, if using. Rest for 10 minutes before removing from the pan to cut and serve.
    ",
    "/images/noicequichelorraine.gif"
);