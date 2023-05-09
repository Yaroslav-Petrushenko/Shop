<?php 
    use app\vendor\Controller;
    use app\helpers\Request;
    use app\models\Product;
    use app\models\Status;

    class ProductController extends Controller
    {
        public function actionProducts()
        {
            $productModel = new Product();
            $statusModel = new Status();
            $allProducts = $productModel->getAllProducts();

            $products = [];
            
            foreach ($allProducts as $key => $product) {
                $status = $statusModel->getOne($product['product']['id_status']);
                $products[$key]['statusName'] = $status['name'];
                $products[$key]['productName'] = $product['product']['name'];
                $products[$key]['description'] = $product['product']['description'];
                $products[$key]['main_image'] = $product['product']['main_image'];
                $products[$key]['quantity'] = $product['product']['quantity'];
                $products[$key]['prices'] = $product['prices']['price'];

            }
            echo '<pre>';
            var_dump($allProducts);
            die;

            $content = [
                'products' => $products,
                $this->getBaseURL(),
            ];

            return $this->view('admin/product/products', $content);
        }
    }
?>