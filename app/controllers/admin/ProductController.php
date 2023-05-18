<?php 
    use app\vendor\Controller;
    use app\helpers\Request;
    use app\models\Product;
    use app\models\Price;
    use app\models\Status;

    class ProductController extends Controller
    {
        public function actionProducts()
        {
            $productModel = new Product();
            $statusModel = new Status();
            $allProducts = $productModel->getAllProducts();

            $content = [
                'products' => $allProducts,
                $this->getBaseURL(),
            ];
            // echo '<pre>';
            // var_dump($allProducts);

            return $this->view('admin/product/products', $content);
        }

        public function actionChange() : void
        {
            if (isset($_POST['update'])) {
                $this->actionUpdate();
            } elseif (isset($_POST['delete'])) {
                $this->actionDelete();
            }
        }

        public function actionOpen()
        {
            $id = $this->getGet('id');
            $productModel = new Product();
            $priceModel = new Price();
            $statusModel = new Status();
            

            $product = $productModel->getOne($id);
            $productPrices = $priceModel->getAll(['id_product' => [$id]]);
            $idsPriceStatus = array_column($productPrices, 'id_status');
            $priceStatuses = $statusModel->getAll(['id_status' => $idsPriceStatus]);

            $content = [
                'product' => $product,
                'prices' => $productPrices,
                'statuses' => $priceStatuses,
            ];

            

            return $this->view('admin/product/view', $content);

        }

        public function actionCreate()
        {
            $request = new Request();
            $productModel = new Product();
            $statusModel = new Status();
            $priceModel = new Price();

            $allStatuses = $statusModel->getAll();

            $priceStatuses = $productStatuses = [];

            

            foreach ($allStatuses as $status) {
                switch ($status['category']) {
                    case 'Price':
                        $priceStatuses[] = $status;
                        break;
                    case 'Product Availability':
                        $productStatuses[] = $status;               
                        break;
                }
            }

            if (!is_null($this->getPost('create'))) {
                $postData = $this->getPost();
                $imageName = $request->saveMedia();

                $setProductData = [
                    'id_status' => $postData['productStatus'],
                    'name' => $postData['name'],
                    'description' => $postData['description'],
                    'quantity' => $postData['quantity'],
                    'main_image' => $imageName,
                ];

                $idProduct = $productModel->insert($setProductData);

                if (!empty($idProduct)) {
                    $setPriceData = [
                        'id_product' => $idProduct,
                        'id_status' => $postData['pricesStatus'],
                        'price' => $postData['price'],
                    ];
                    $priceModel->insert($setPriceData);
                }
            }

            $content = [
                'priceStatuses' => $priceStatuses,
                'productStatuses' => $productStatuses,
            ];

            return $this->view('admin/product/create', $content);
        }

        public function actionUpdate()
        {
            $productModel = new Product();
            $priceModel = new Price();
            $statusModel = new Status();

            $data = [
                'id_product' => $this->getPost('id_product'),
                'name' => $this->getPost('name'),
                'description' => $this->getPost('description'),
                'quantity' => $this->getPost('quantity'),                      
            ];

            $productModel->update($this->getPost('id_product'), $data);
    
            return $this->redirect('../products');
        }

        // public function actionDelete()
        // {
        //     if ($this->getPost('delete')) {
        //         $statusModel = new Product();
        //         $idProduct = $this->getPost('delete');
        //         // var_dump($statusModel);
        //         // die;

        //         // Видалення цін пов'язаних з продуктом
        //         $statusModel->delete($idProduct);

        //         // Видалення продукту
        //         // $productModel->delete($idProduct);
        //     }

        //     return $this->redirect('../products');
        // }

        // public function actionDelete()
        // {
        //     if ($this->getPost('delete')) {
        //         // $statusModel = new Status();
        //         $priceModel = new Price();
        //         $productModel = new Product();
        //         $idStatus = $this->getPost('delete');

        //         // $priceModel->delete($idStatus);
        //         $productModel->delete($idStatus);
        //         // $statusModel->delete($idStatus);
        //     }

        //     return $this->redirect('../products');
        // }

    }

?>
