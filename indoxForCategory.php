<?php
class Category 
{
    public $name;
    public $filters = [];
    public $listProducts = [];
    public function __construct($name, $filters) 
    {
        $this->name = $name;
        $this->filters = $filters;
        $this->filters[] = 'Price';
    }
    public function addProduct($product) 
    {
        $this->listProducts[] = $product;
    }
}
class PhoneCategory extends Category 
{
    public function __construct($name) 
    {
        parent::__construct($name, ['Ram', 'CountSim', 'Hdd', 'OS']);
    }
}
class MonitorCategory extends Category 
{
    public function __construct($name) 
    {
        parent::__construct($name, ['Diagonal', 'Frequency']);
    }
}
$categories = [];
$categories[] = new PhoneCategory('Phones');
$categories[] = new MonitorCategory('Monitors');
$products = [
    ['type' => 'Phone', 'name' => 'iPhone 12', 'Price' => 999, 'Ram' => 4, 'CountSim' => 1, 'Hdd' => 128, 'OS' => 'iOS'],
    ['type' => 'Monitor', 'name' => 'Samsung Monitor', 'Price' => 199, 'Diagonal' => 24, 'Frequency' => 60],
];
foreach ($products as $product) 
{
    if ($product['type'] == 'Phone') 
    {
        $categories[0]->addProduct($product);
    } 
    elseif ($product['type'] == 'Monitor') 
    {
        $categories[1]->addProduct($product);
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    .category
    {
        margin-bottom: 20px;
    }
    .filters, .products
    {
        margin-top: 10px; display: none;
    }
</style>
<body>
<h1>Categories</h1>
<?php foreach ($categories as $category): ?>
    <div class="category">
        <h2 onclick="toggleFilters('<?php echo $category->name; ?>')"><?php echo $category->name; ?></h2>
        <div id="filters-<?php echo $category->name; ?>" class="filters">
            <form onsubmit="applyFilters('<?php echo $category->name; ?>'); return false;">
                <?php foreach ($category->filters as $filter): ?>
                    <label><?php echo $filter; ?> min: <input type="text" name="<?php echo $filter; ?>_min"></label>
                    <label><?php echo $filter; ?> max: <input type="text" name="<?php echo $filter; ?>_max"></label><br>
                <?php endforeach; ?>
                <button type="submit">Apply Filters</button>
            </form>
        </div>
    </div>
<?php endforeach; ?>
<h1>Products</h1>
<?php foreach ($categories as $category): ?>
    <div class="products" id="products-<?php echo $category->name; ?>">
        <h3><?php echo $category->name; ?> Products</h3>
        <?php foreach ($category->listProducts as $product): ?>
            <div>
                <?php foreach ($product as $key => $value): ?>
                    <span><?php echo $key; ?>: <?php echo $value; ?></span>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
<?php endforeach; ?>
<script>
    function toggleFilters(categoryName)
    {
        var filters = document.getElementById('filters-' + categoryName);
        if (filters.style.display === "none")
        {
            filters.style.display = "block";
        }
        else
        {
            filters.style.display = "none";
        }
    }
    function applyFilters(categoryName)
    {
    }
</script>
</body>
</html>