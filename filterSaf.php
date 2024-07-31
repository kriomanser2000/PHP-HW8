<?php
echo '<h1>Categories</h1>';
foreach ($categories as $category)
{
    echo '<div>';
    echo '<h2>' . $category->name . '</h2>';
    echo '<ul>';
    foreach ($category->filters as $filter)
    {
        echo '<li>' . $filter . ' (min - max)</li>';
    }
    echo '</ul>';
    echo '<button onclick="showFilters(\'' . $category->name . '\')">Show Filters</button>';
    echo '</div>';
}
echo '<h1>Products</h1>';
foreach ($categories as $category)
{
    echo '<div id="' . $category->name . '" style="display:none;">';
    foreach ($category->listProducts as $product)
    {
        echo '<div>';
        foreach ($product as $key => $value)
        {
            echo '<span>' . $key . ': ' . $value . '</span> ';
        }
        echo '</div>';
    }
    echo '</div>';
}
?>
<script>
    function showFilters(categoryName)
    {
        var div = document.getElementById(categoryName);
        if (div.style.display === "none")
        {
            div.style.display = "block";
        }
        else
        {
            div.style.display = "none";
        }
    }
</script>