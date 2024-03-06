
<x-app-layout>
    <div class="container mx-auto mt-8">
        <form action="{{ route('abonnements.store') }}" method="POST" class="max-w-md mx-auto">
            @csrf
            <!-- Type -->
            <div class="mb-4">
                <label for="type" class="block text-gray-600 text-sm font-semibold mb-2">Type</label>
                <select name="type" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" id="type">
                    <option value="Plan Gratuit">Plan Gratuit</option>
                    <option value="Plan Standard">Plan Standard</option>
                    <option value="Plan Premium">Plan Premium</option>
                </select>
            </div>
    
           
    
            <!-- Number of Articles -->
            <div class="mb-4">
                <label for="nbr_article" class="block text-gray-600 text-sm font-semibold mb-2">Number of Articles</label>
                <input type="number" name="nbr_article" id="nbr_article" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" required>
            </div>
             <div class="mb-4">
                <label for="nbr_days" class="block text-gray-600 text-sm font-semibold mb-2">Number of days</label>
                <input type="number" name="nbr_days" id="nbr_days" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" required>
            </div>
            
             <div class="mb-4">
                <label for="price" class="block text-gray-600 text-sm font-semibold mb-2">price</label>
                <input type="text" name="price" id="price" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" required>
            </div>
    
            <!-- Type Media -->
            <div class="mb-4">
                <label for="type_media" class="block text-gray-600 text-sm font-semibold mb-2">Type Media</label>
                <select name="type_media" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" id="type_media">
                    <option value="image">image</option>
                    <option value="video">video</option>
                </select>
            </div>
    
            <!-- Number of Scans -->
            <div class="mb-4">
                <label for="nbr_scan" class="block text-gray-600 text-sm font-semibold mb-2">Number of Scans</label>
                <input type="number" name="nbr_scan" id="nbr_scan" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" required>
            </div>
    
            <div class="mt-6">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue">Add to Table</button>
            </div>
        </form>
    </div>
</x-app-layout>
