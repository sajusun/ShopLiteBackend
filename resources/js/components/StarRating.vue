<template>
    <div class="flex space-x-1 items-center">
        <i
            v-for="star in 5"
            :key="star"
            :class="[
        'fa-star',
        star <= hoverRating ? 'fas text-yellow-500' :
        (star <= selectedRating ? 'fas text-yellow-400' : 'far text-gray-300'),
        'cursor-pointer', 'transition-colors'
      ]"
            @mouseover="hoverRating = star"
            @mouseleave="hoverRating = selectedRating"
            @click="rate(star)"
        ></i>
<!--        <span class="text-yellow-500 px-1">({{ toNumber(userRating, 1) }})</span>-->
        <span v-if="status" class="ml-2 text-sm text-green-500">{{ status }}</span>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    props: {
        productId: { type: Number, required: true },
        userRating: { type: Number, default: 0 },
    },
    data() {
        return {
            selectedRating: this.userRating,
            hoverRating: this.userRating,
            debounceTimer: null,
            status: null,
        };
    },
    methods: {
        rate(star) {
            this.selectedRating = star;
            this.hoverRating = star;
            this.status = 'Submitting...';

            // Debounce submission
            if (this.debounceTimer) clearTimeout(this.debounceTimer);
            this.debounceTimer = setTimeout(() => this.submitRating(star), 800);
        },
        async submitRating(rating) {
            try {
                await axios.post(`/product/${this.productId}/rating`, {
                    // product_id: this.productId,
                    rating: rating,
                });
                this.status = 'Rated successfully!';
            } catch (err) {
                this.status = 'Submission failed.';
                console.error(err);
            }

            setTimeout(() => (this.status = null), 2000);
        },
    },
};
</script>

<style scoped>
/* Optional: transition effect */
i {
    transition: color 0.2s ease;
}
</style>
<!--<template>-->
<!--    <div style="color:red; font-size:20px">🌟 VUE IS WORKING 🌟</div>-->
<!--</template>-->

<!--<script>-->
<!--export default {}-->
<!--</script>-->

