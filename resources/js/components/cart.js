import React, {Component} from 'react';
import ReactDOM from 'react-dom'
import axios from "axios"
import Swal from 'sweetalert2'
import {sum} from 'lodash'

class Cart extends Component {

    constructor(props) {
        super(props)
        this.state = {
            cart: [],
            products: [],
            barcode: '',
        };

        this.loadCart = this.loadCart.bind(this);
        this.handleOnChangeBarcode = this.handleOnChangeBarcode.bind(this)
        this.handleScanBarcode = this.handleScanBarcode.bind(this)
        this.handleClickSubimit = this.handleClickSubimit.bind(this)

        this.loadProducts = this.loadProducts.bind(this);
    }

    componentDidMount() {
        // load user cart
        this.loadCart();
        this.loadProducts();
    }

    loadProducts() {
        axios.get('home/products').then(res => {
            const products = res.data.data;
            this.setState({ products });
        });
    }

    handleOnChangeBarcode(event) {
        const barcode = event.target.value;
        console.log(barcode);
        this.setState({barcode})
    }

    loadCart() {
        axios.get('/cart').then(res => {
            const cart = res.data;
            this.setState({cart})
        })
    }

    handleScanBarcode(event) {
        event.preventDefault();
        const {barcode} =this.state;
        if(!! barcode){
            axios.post('/cart', {barcode}).then(res => {
                this.loadCart();
                this.setState({barcode: ''})
            }).catch(err => {
                Swal.fire(
                    'Error!',
                    err.response.data.message,
                    'error'
                )
            })
        }
    }
    handleChangeQty (event) {
        //
    }

    getTotal(cart) {
        const total = cart.map(c => c.pivot.quantity * c.price);
        return sum(total).toFixed(2);
    }
    handleClickDelete(product_id){
        axios.post("/cart/delete", { product_id, _method: "DELETE" }).then(res => {
            const cart = this.state.cart.filter(c => c.id !== product_id);
            this.setState({cart});
        })
    }
    handleClickSubimit(){
        axios.post("home/orders", {user_id: this.state.user_id}).then(res => {
            this.loadCart();
        })
    }
    render() {
        const {cart , products, barcode} = this.state;
        return (
            <div className="row">
                <div className="col-md-6 col-lg-6">
                    <div className="row mb-2">
                        <div className="col">
                            <form onSubmit={this.handleScanBarcode}>
                                <input 
                                    type="text" 
                                    className="form-control" 
                                    placeholder="Scan Barcode ... " 
                                    value={barcode}
                                    onChange={this.handleOnChangeBarcode}
                                />
                            </form>                           
                        </div>

                    </div>
                    <div className="user-cart"> 
                        <div className="card">
                            <table className="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th className="text-right">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                {cart.map(c => (
                                    <tr key={c.id}>
                                        <td>{c.name}</td>
                                        <td className="text-center " > {c.pivot.quantity} </td>
                                        <td className="text-right"> {(c.price * c.pivot.quantity).toFixed(2)} บ.</td>
                                        <button 
                                                className="btn btn-danger btn-sm"
                                                onClick={() => this.handleClickDelete(c.id)}
                                                >    
                                                    <i className="fas fa-trash"></i>
                                            </button>
                                    </tr>
                                ))}
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div className="row">
                        <div className="col">Total</div>
                        <div className="col text-right">{this.getTotal(cart)} บ.</div>
                    </div>
                    <div className="row">
                        <div className="col text-right">
                            <button 
                            type="button" 
                            className="btn btn-primary btn-block"
                            disabled={!cart.length}
                            onClick={this.handleClickSubimit}
                            >
                                บันทึก
                            </button>
                        </div>
                    </div>
                </div>
                <div className="col-md-6 col-lg-4">

                    <div className="order-product">
                    {products.map(p => (
                        <div key={p.id} className="item">
                            <img src={p.image_url} alt="" />
                            <h5>{p.name}</h5>
                        </div>
                    ))}
                        
                    </div>
                </div>
            </div>
        );
    }
}

export default Cart;

if (document.getElementById('cart')) {
    ReactDOM.render(<Cart />, document.getElementById('cart'))
}