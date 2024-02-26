
<x-app-layout>
    <div class="container mx-auto mt-8">
        <form action="{{ route('abonnements.update',$Abonnement) }}" method="POST" class="max-w-md mx-auto">
            @csrf
            @method('PUT')
            <!-- Type -->
            <div class="mb-4">
                <label for="type" class="block text-gray-600 text-sm font-semibold mb-2">Type</label>
                <select name="type" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" id="type">
                    <option value="Plan Gratuit" {{ ($Abonnement->type=='Plan Gratuit')?'selected':'' }}>Plan Gratuit</option>
                    <option value="Plan Standard"  {{ ($Abonnement->type=='Plan Standard')?'selected':'' }}>Plan Standard</option>
                    <option value="Plan Premium" {{ ($Abonnement->type=='Plan Premium')?'selected':'' }}>Plan Premium</option>
                </select>
            </div>
    
           
    
            <!-- Number of Articles -->
            <div class="mb-4">
                <label for="nbr_article" class="block text-gray-600 text-sm font-semibold mb-2">Number of Articles</label>
                <input type="number" name="nbr_article" value="{{ $Abonnement->nbr_article }}" id="nbr_article" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" required>
            </div>
    
            <!-- Type Media -->
            <div class="mb-4">
                <label for="type_media" class="block text-gray-600 text-sm font-semibold mb-2">Type Media</label>
                <select name="type_media" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" id="type_media">
                    <option value="image" {{ ($Abonnement->type_media=='image')?'selected':'' }}>image</option>
                    <option value="video" {{ ($Abonnement->type_media=='video')?'selected':'' }}>video</option>
                </select>
            </div>
    
            <!-- Number of Scans -->
            <div class="mb-4">
                <label for="nbr_scan" class="block text-gray-600 text-sm font-semibold mb-2">Number of Scans</label>
                <input type="number" name="nbr_scan" value="{{ $Abonnement->nbr_scan }}" id="nbr_scan" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" required>
            </div>
    
            <div class="mt-6">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue">Add to Table</button>
            </div>
        </form>
    </div>
</x-app-layout>
