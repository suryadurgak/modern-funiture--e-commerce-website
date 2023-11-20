let clicked = false;

function toggleWishlist() {
  const wishlistIcon = document.querySelector('.wishlist-icon');
  clicked = !clicked;

  if (clicked) {
    wishlistIcon.classList.add('clicked'); // Adds the 'clicked' class to change color
    // Add code here to handle adding to wishlist
    // You might want to send an API request or update some data
  } else {
    wishlistIcon.classList.remove('clicked'); // Removes the 'clicked' class to revert color
    // Add code here to handle removing from wishlist
  }
}
