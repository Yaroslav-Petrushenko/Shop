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
                $products[$key]['product'] = $product['product'];
                $products[$key]['name'] = $product['name'];
                $products[$key]['description'] = $product['description'];
                $products[$key]['main_image'] = $product['main_image'];
                $products[$key]['product_status_name'] = $product['product_status_name'];
                $products[$key]['quantity'] = $product['quantity'];
                // $products['prices'][$key]['status'] = $product['status'];
                // $products[$key]['prices'] = $product["prices"]['status'];
                // $products[$key]['prices'] = $product["prices"]['price'];
                $products[$key]['prices'] = [];

                foreach ($product['prices'] as $price) {
                    $products[$key]['prices'][] = [
                        'status' => $price['status'],
                        'price' => $price['price'],
                    ];
                }

            }

            $content = [
                'products' => $products,
                $this->getBaseURL(),
            ];

            return $this->view('admin/product/products', $content);
        }
    }

    // $status = $statusModel->getOne((int)$product['product']['id_status']);
    // $products[$key]['statusName'] = $status['name'];
    // $products[$key]['productName'] = $product['product']['name'];
    // $products[$key]['description'] = $product['product']['description'];
    // $products[$key]['main_image'] = $product['product']['main_image'];
    // $products[$key]['quantity'] = $product['product']['quantity'];
    // $products[$key]['prices'] = $product['prices']['price'];
?>
