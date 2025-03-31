import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

document.addEventListener('DOMContentLoaded', function() {
    // +と-ボタンを取ってくる
    const increaseButtons = document.querySelectorAll('.increase-btn');
    const decreaseButtons = document.querySelectorAll('.decrease-btn');
    
    // 押されたら商品数の変更
    increaseButtons.forEach(button => {
      button.addEventListener('click', function() {
        const item = this.getAttribute('data-item');
        const container = this.closest('div');
        const quantityDisplay = container.querySelector('.quantity-display');
        const quantityInput = container.querySelector('.quantity-input');
        
        let currentValue = parseInt(quantityInput.value);
        currentValue++;
        
        quantityDisplay.textContent = currentValue;
        quantityInput.value = currentValue;
      });
    });
    
    decreaseButtons.forEach(button => {
      button.addEventListener('click', function() {
        const item = this.getAttribute('data-item');
        const container = this.closest('div');
        const quantityDisplay = container.querySelector('.quantity-display');
        const quantityInput = container.querySelector('.quantity-input');
        
        let currentValue = parseInt(quantityInput.value);
        if (currentValue > 0) {
          currentValue--;
        }
        
        quantityDisplay.textContent = currentValue;
        quantityInput.value = currentValue;
      });
    });
    
    // 決済ボタンが押されたときにPOSTする
    document.getElementById('menuForm').addEventListener('submit', function(event) {
      event.preventDefault();
      
      const formData = new FormData(this);
      fetch('/api/orders', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        console.log('Success:', data);
      })
      .catch(error => {
        console.error('Error:', error);
      });
    });
  });