<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Stateless Shopping Cart</title>
    <style>
        body { font-family: sans-serif; padding: 2rem; background: #f4f6f9; }
        .container { max-width: 600px; margin: 0 auto; background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); }
        button { padding: 8px 12px; margin: 5px 0; cursor: pointer; background: #1a57a0; color: white; border: none; border-radius: 4px; }
        button:hover { background: #13407a; }
        pre { background: #eee; padding: 10px; border-radius: 4px; font-size: 12px; overflow-x: auto; }
    </style>
</head>
<body>

<div class="container">
    <h1>Toko Online (Stateless)</h1>
    
    <h2>Daftar Produk</h2>
    <button onclick="add(1)">Buku Tulis - Rp5.000</button><br>
    <button onclick="add(2)">Pulpen - Rp3.000</button><br>
    <button onclick="add(3)">Penggaris - Rp4.000</button>

    <h2>Keranjang Belanja</h2>
    <div id="items">Keranjang kosong.</div>
    <h3 id="total">Total: Rp0</h3>
    
    <button onclick="recalculate()" style="background: #e65100;">Hitung Ulang</button>
    <button onclick="clearCart()" style="background: #c62828;">Kosongkan Keranjang</button>

    <h3>Respons Laravel</h3>
    <pre id="response">Belum ada request.</pre>
</div>

<script>
let cart = {};

async function post(url, payload) {
    const response = await fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify(payload)
    });

    const data = await response.json();
    if (!response.ok) throw new Error(JSON.stringify(data));
    return data;
}

async function add(id) {
    try {
        const data = await post('/cart/add', {
            cart: cart,
            product_id: id
        });
        
        cart = Object.fromEntries(
            data.items.map(item => [item.id, item.quantity])
        );
        
        render(data);
    } catch (error) {
        alert(error.message);
    }
}

async function recalculate() {
    if (Object.keys(cart).length === 0) {
        alert('Keranjang kosong.');
        return;
    }
    try {
        render(await post('/cart/update', { cart: cart }));
    } catch (error) {
        alert(error.message);
    }
}

function render(data) {
    const container = document.getElementById('items');
    container.replaceChildren();

    if (data.items.length === 0) {
        container.textContent = 'Keranjang kosong.';
    } else {
        data.items.forEach(item => {
            const row = document.createElement('p');
            row.textContent = `${item.name} x ${item.quantity} = Rp${item.subtotal.toLocaleString('id-ID')}`;
            container.appendChild(row);
        });
    }

    document.getElementById('total').textContent = 
        'Total: Rp' + data.total.toLocaleString('id-ID');
    document.getElementById('response').textContent = 
        JSON.stringify(data, null, 2);
}

function clearCart() {
    cart = {};
    render({ items: [], total: 0 });
}
</script>

</body>
</html>