<template>
    <div class="container">
        <div class="container">
            <h2>Contact Us</h2>
            <form id="contactForm" action="#" method="post">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required />
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required />
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="tel" id="phone" name="phone" />
                </div>
                <div class="form-group">
                    <label for="country">Country:</label>
                    <select id="country" name="country" required>
                        <option value="">Select Country</option>
                        <option value="usa">USA</option>
                        <option value="canada">Canada</option>
                        <!-- Add more countries as needed -->
                    </select>
                </div>
                <div class="form-group">
                    <label for="city">City:</label>
                    <input type="text" id="city" name="city" />
                </div>
                <div class="form-group">
                    <label for="state">State:</label>
                    <input type="text" id="state" name="state" />
                </div>
                <div class="form-group">
                    <label for="zipcode">ZIP Code:</label>
                    <input type="text" id="zipcode" name="zipcode" />
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
</template>
<script>
export default {
    mounted() {
        console.log("Contacts mounted.");
    },
};
</script>
