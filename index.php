<?php require_once __DIR__ . '/../partials/header.php'; ?>

<main class="container my-5">
    <!-- Hero Section -->
    <section class="hero-section bg-light py-5 mb-5 rounded">
        <div class="container text-center">
            <h1 class="display-4">🇿🇦 Welcome to Mzansi Online Market</h1>
            <p class="lead">Authentic South African products at your fingertips</p>
            <div class="mt-4">
                <a href="/ecommerce-platform/public/products" class="btn btn-primary btn-lg me-2">
                    <i class="fas fa-shopping-bag"></i> Shop Now
                </a>
                <a href="#featured" class="btn btn-outline-secondary btn-lg">
                    <i class="fas fa-chevron-down"></i> Explore
                </a>
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    <section id="featured" class="mb-5">
        <h2 class="text-center mb-4">🇿🇦 Featured Products</h2>
        <div class="row">
            <?php
            $products = $conn->query("SELECT * FROM products WHERE is_featured = 1 LIMIT 3");
            while ($product = $products->fetch_assoc()):
            ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 product-card">
                    <?php if (!empty($product['image_url'])): ?>
                        <img src="<?= htmlspecialchars($product['image_url']) ?>" 
                             class="card-img-top product-image" 
                             alt="<?= htmlspecialchars($product['name']) ?>">
                    <?php else: ?>
                        <div class="placeholder-image bg-secondary d-flex align-items-center justify-content-center">
                            <i class="fas fa-image fa-5x text-light"></i>
                        </div>
                    <?php endif; ?>
                    
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($product['name']) ?></h5>
                        <p class="card-text text-muted">
                            <?= htmlspecialchars($product['short_description']) ?>
                        </p>
                    </div>
                    
                    <div class="card-footer bg-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="price">
                                <?= sprintf(ZAR_FORMAT, number_format($product['price'], 2)) ?>
                                <small class="vat-badge <?= $product['vat_rate'] > 0 ? 'text-danger' : 'text-success' ?>">
                                    <?= $product['vat_rate'] > 0 ? '(incl. VAT)' : '(VAT free)' ?>
                                </small>
                            </span>
                            <button class="btn btn-sm btn-outline-primary add-to-cart" 
                                    data-id="<?= $product['product_id'] ?>">
                                <i class="fas fa-cart-plus"></i> Add
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        
        <div class="text-center mt-4">
            <a href="/ecommerce-platform/public/products" class="btn btn-link">
                View All Products <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </section>

    <!-- SA Special Offers -->
    <section class="bg-light p-5 rounded mb-5">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2><i class="fas fa-tag text-danger"></i> Mzansi Specials</h2>
                <p>Exclusive deals on authentic South African products:</p>
                <ul class="list-unstyled">
                    <li><i class="fas fa-check text-success"></i> Free delivery for orders over R500</li>
                    <li><i class="fas fa-check text-success"></i> Same-day dispatch in Gauteng</li>
                    <li><i class="fas fa-check text-success"></i> EFT, Credit Card or PayFast payments</li>
                </ul>
            </div>
            <div class="col-md-6">
                <img src="/ecommerce-platform/public/assets/images/sa-special.jpg" 
                     alt="South African Specials" 
                     class="img-fluid rounded">
            </div>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>

<style>
    .product-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    .product-image {
        height: 200px;
        object-fit: cover;
    }
    .placeholder-image {
        height: 200px;
    }
    .vat-badge {
        font-size: 0.7rem;
    }
    .price {
        font-weight: bold;
        color: #e67e22;
    }
</style>

<script>
$(document).ready(function() {
    // Add to cart functionality
    $('.add-to-cart').click(function() {
        const productId = $(this).data('id');
        alert('Added product #' + productId + ' to cart!');
        // AJAX call would go here in production
    });
    
    // ZAR currency formatting
    $('.price').each(function() {
        const amount = parseFloat($(this).text().replace('R ', ''));
        $(this).text('R ' + amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
    });
});
</script>