session_start(); // Start the session to manage flash messages or user data
include('../config/dbcon.php'); // Include database connection
include('../functions/myfunctions.php'); // Include custom helper functions like 'redirect'
if(isset($_POST['add_category_btn']))
{
   // Get all form data from POST request
   $name = $_POST['name'];
   $slug = $_POST['slug'];
   $description = $_POST['description'];
   $meta_title = $_POST['meta_title'];
   $meta_description = $_POST['meta_description'];
   $meta_keywords = $_POST['meta_keywords'];
   $status = isset($_POST['status']) ? '1' : '0'; // Checkbox to determine status (0 = hidden, 1 = visible)
   $popular = isset($_POST['popular']) ? '1' : '0'; // Checkbox to mark popular

   // Handle image upload
   $image = $_FILES['image']['name']; // Uploaded image name
   $path = "../uploads"; // Upload directory
   $image_ext = pathinfo($image, PATHINFO_EXTENSION); // Get image extension (jpg/png/etc.)
   $filename = time().'.'.$image_ext; // Generate unique file name using timestamp

   // Prepare and run the insert query
   $cate_query = "INSERT INTO categories (name, slug, description, meta_title, meta_description, meta_keywords, status, popular, image) 
   VALUES ('$name','$slug','$description','$meta_title','$meta_description','$meta_keywords','$status','$popular','$filename')";

   $cate_query_run = mysqli_query($con, $cate_query);

   if($cate_query_run)
   {
      // Move image to uploads folder
      move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
      redirect("add-category.php", "Category Added Successfully");
   }
   else
   {
      redirect("add-category.php", "Something went wrong");
   }
}
else if(isset($_POST['update_category_btn']))
{
   // Get all fields including the category ID
   $category_id = $_POST['category_id'];
   $name = $_POST['name'];
   $slug = $_POST['slug'];
   $description = $_POST['description'];
   $meta_title = $_POST['meta_title'];
   $meta_description = $_POST['meta_description'];
   $meta_keywords = $_POST['meta_keywords'];
   $status = isset($_POST['status']) ? '1' : '0';
   $popular = isset($_POST['popular']) ? '1' : '0';

   $new_image = $_FILES['image']['name'];
   $old_image = $_POST['old_image'];

   // If a new image is uploaded, create a new filename
   if($new_image != "")
   {
      $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
      $update_filename = time().'.'.$image_ext;
   }
   else {
      $update_filename = $old_image; // Keep the old image if no new image is uploaded
   }

   $path= "../uploads";

   // Update query
   $update_query = "UPDATE categories SET 
      name='$name', slug='$slug', description='$description',
      meta_title='$meta_title', meta_description='$meta_description',
      meta_keywords='$meta_keywords', status='$status',
      popular='$popular', image='$update_filename'
      WHERE id='$category_id'";

   $update_query_run = mysqli_query($con, $update_query);

   if($update_query_run)
   {
      if($_FILES['image']['name'] != "")
      {
         move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$update_filename);
         if(file_exists("../uploads/".$old_image))
         {
            unlink("../uploads/".$old_image); // Remove old image from server
         }
      }
      redirect("edit-category.php?id=$category_id", "Category updated successfully");
   }
   else
   {
      redirect("edit-category.php?id=$category_id", "Something Went Wrong");
   }
}
else if(isset($_POST['delete_category_btn']))
{
   $category_id = mysqli_real_escape_string($con, $_POST['category_id']);

   // Get category details first (to get the image filename)
   $category_query = "SELECT * FROM categories WHERE id='$category_id'";
   $cate_query_run = mysqli_query($con, $category_query);
   $category_data = mysqli_fetch_array($cate_query_run);
   $image = $category_data['image'];

   // Delete from DB
   $delete_query = "DELETE FROM categories WHERE id='$category_id'";
   $delete_query_run = mysqli_query($con, $delete_query);

   if($delete_query_run)
   {
      // Delete the image file
      if(file_exists("../uploads/".$image))
      {
         unlink("../uploads/".$image);
      }
      redirect("category.php", "Category Deleted Successfully");
   }
   else
   {
      redirect("category.php", "Something went wrong");
   }
}
else if(isset($_POST['add_product_btn']))
{
   // Get product fields from POST
   $category_id = $_POST['category_id'];
   $name = $_POST['name'];
   $slug = $_POST['slug'];
   $small_description = $_POST['small_description'];
   $description = $_POST['description'];
   $original_price = $_POST['original_price'];
   $selling_price = $_POST['selling_price'];
   $qty = $_POST['qty'];
   $meta_title = $_POST['meta_title'];
   $meta_description = $_POST['meta_description'];
   $meta_keywords = $_POST['meta_keywords'];
   $status = isset($_POST['status']) ? '1' : '0';
   $trending = isset($_POST['trending']) ? '1' : '0';

   // Image Handling
   $image = $_FILES['image']['name'];
   $path = "../uploads";
   $image_ext = pathinfo($image, PATHINFO_EXTENSION);
   $filename = time().'.'.$image_ext;

   // Check mandatory fields
   if($name != "" && $slug != "" && $description != "")
   {
      $product_query = "INSERT INTO products(category_id, name, slug, small_description, description, original_price, selling_price, qty, meta_title, meta_description, meta_keywords, status, trending, image)
      VALUES ('$category_id', '$name','$slug', '$small_description', '$description', '$original_price','$selling_price', '$qty', '$meta_title', '$meta_description', '$meta_keywords', '$status', '$trending', '$filename')";

      $product_query_run = mysqli_query($con, $product_query);

      if($product_query_run)
      {
         move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
         redirect("add-product.php", "Product Added Successfully");
      }
      else {
         redirect("add-product.php", "Something went wrong");
      }
   }
   else {
      redirect("add-product.php", "All fields are mandatory");
   }
}
